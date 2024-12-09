<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Ttd;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Tr_AtkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atk = Atk::with(['pegawai', 'barang'])
            ->whereHas('pegawai', function ($query) { // Menampilkan hanya data yang dibuat oleh user yang sedang login
                $query->where('user_id', auth()->id()); // Filter berdasarkan user_id yang login
            })
            ->orderBy('created_at', 'desc') // Data terbaru di atas
            ->get();

        return view('tr_atk.index', compact('atk'));
    }

    public function create()
    {
         // Mengambil data pegawai dan mengurutkannya berdasarkan nama
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();

        // Mengambil data barang dan mengurutkannya berdasarkan nama_barang
        $barang = Barang::orderBy('nama_barang', 'asc')->get();
        return view('tr_atk.create', compact('pegawai', 'barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'jumlah_barang' => 'required|integer',
            'status' => 'Pengajuan',
        ]);
    
        // Temukan barang berdasarkan ID
        $barang = Barang::find($request->barang_id);
        // Cari data pegawai yang sesuai dengan user yang sedang login
        $pegawai = Pegawai::where('user_id', auth()->id())->first();

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data pegawai tidak ditemukan.');
        }
    
        // Cek apakah stok barang mencukupi
        if ($barang->stok < $request->jumlah_barang) {
            return redirect()->route('atk.index')->with('error', 'Stok barang tidak mencukupi.');
        }
    
        // Kurangi stok barang
        $barang->stok -= $request->jumlah_barang;
        $barang->save(); // Simpan perubahan stok barang
    
        // Simpan data permintaan
        Atk::create([
            'pegawai_id' => $pegawai->id,
            'barang_id' => $request->barang_id,
            'jumlah_barang' => $request->jumlah_barang,
            'status' => 'Pengajuan',
            'tanggal' => now(), // Menyimpan tanggal saat ini
            'uuid' => (string) \Illuminate\Support\Str::uuid(), // Tambahkan UUID
        ]);
    
        return redirect()->route('tr_atk.index')->with('success', 'Data permintaan ATK berhasil ditambahkan, stok barang telah dikurangi.');
    }

    public function edit(string $uuid)
    {
        $atk = Atk::where('uuid', $uuid)->firstOrFail();
        $pegawai = Pegawai::all();
        $barang = Barang::all();
        return view('tr_atk.edit', compact('atk', 'pegawai', 'barang'));
    }

    public function update(Request $request, string $uuid)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'jumlah_barang' => 'required|integer|min:1',
        ]);

        // Cari transaksi ATK berdasarkan UUID
        $transaksi = Atk::where('uuid', $uuid)->firstOrFail();

        // Cari barang berdasarkan ID
        $barang = Barang::findOrFail($request->barang_id);

        // Cari pegawai yang sesuai dengan user yang sedang login
        $pegawai = Pegawai::where('user_id', auth()->id())->first();
        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        // Hitung selisih jumlah barang
        $selisih = $request->jumlah_barang - $transaksi->jumlah_barang;

        // Periksa apakah stok mencukupi
        if ($barang->stok >= $selisih) {
            // Update stok barang
            $barang->stok -= $selisih; 
            $barang->save();

            // Update data transaksi
            $transaksi->update([
                'pegawai_id' => $pegawai->id, // Tetap menggunakan pegawai yang login
                'barang_id' => $request->barang_id,
                'jumlah_barang' => $request->jumlah_barang,
                'tanggal' => now(), // Tanggal diperbarui ke saat ini
            ]);

            return redirect()->route('tr_atk.index')->with('success', 'Data permintaan ATK berhasil diperbarui, stok barang telah diubah.');
        } else {
            // Jika stok tidak mencukupi
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi untuk memperbarui transaksi.');
        }
    }


    public function destroy(string $uuid)
    {
        $atk = Atk::where('uuid', $uuid)->firstOrFail();
        // Temukan barang yang terkait dengan transaksi
        $barang = Barang::findOrFail($atk->barang_id);

        // Kembalikan stok barang sebelum menghapus transaksi
        $barang->stok += $atk->jumlah_barang; // Tambahkan kembali jumlah yang diminta
        $barang->save();

        // Hapus transaksi
        $atk->delete();

        return redirect()->route('tr_atk.index')->with('success', 'Data permintaan ATK berhasil dihapus, stok barang telah diperbarui.');
    }
    public function print($uuid)
    {
        $atk = Atk::where('uuid', $uuid)->firstOrFail();
        $ttd = Ttd::first();

        $pdf = Pdf::loadView('tr_atk.print', compact('atk', 'ttd'));

        return $pdf->download('permintaan_atk_' . $atk->id . '.pdf');
    }
}
