<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use App\Models\Barang;
use App\Models\Pegawai;
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
            ->where('pegawai_id', auth()->id()) // Menampilkan hanya data yang dibuat oleh user yang sedang login
            ->orderBy('created_at', 'desc') // Mengurutkan data berdasarkan tanggal pembuatan, yang terbaru di atas
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
            'pegawai_id' => 'required|exists:pegawai,id',
            'barang_id' => 'required|exists:barang,id',
            'jumlah_barang' => 'required|integer',
            'status' => 'Pengajuan',
        ]);
    
        // Temukan barang berdasarkan ID
        $barang = Barang::find($request->barang_id);
    
        // Cek apakah stok barang mencukupi
        if ($barang->stok < $request->jumlah_barang) {
            return redirect()->route('atk.index')->with('error', 'Stok barang tidak mencukupi.');
        }
    
        // Kurangi stok barang
        $barang->stok -= $request->jumlah_barang;
        $barang->save(); // Simpan perubahan stok barang
    
        // Simpan data permintaan
        Atk::create([
            'pegawai_id' => $request->pegawai_id,
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

    public function update(Request $request, Atk $uuid)
    {
        $atk = Atk::where('uuid', $uuid)->firstOrFail();
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'barang_id' => 'required|exists:barang,id',
            'jumlah_barang' => 'required|integer|min:1',
            'status' => 'Pengajuan',
        ]);

        // Ambil transaksi lama dan barang terkait
        $transaksi = $atk;
        $barang = Barang::findOrFail($request->barang_id);

        // Hitung selisih jumlah barang (transaksi baru - transaksi lama)
        $selisih = $request->jumlah_barang - $transaksi->jumlah_barang;

        // Periksa apakah stok mencukupi untuk perubahan
        if ($barang->stok >= $selisih) {
            // Perbarui stok barang
            $barang->stok -= $selisih; // Kurangi stok dengan selisih jumlah yang diubah
            $barang->save();

            // Perbarui transaksi
            $transaksi->pegawai_id = $request->pegawai_id;
            $transaksi->barang_id = $request->barang_id;
            $transaksi->jumlah_barang = $request->jumlah_barang;
            $transaksi->tanggal = now(); // Menyimpan tanggal saat ini
            $transaksi->save();

            return redirect()->route('tr_atk.index')->with('success', 'Data permintaan ATK berhasil diupdate, stok barang telah diperbarui.');
        } else {
            // Jika stok tidak mencukupi
            return redirect()->route('tr_atk.index')->with('error', 'Stok barang tidak mencukupi untuk memperbarui transaksi.');
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

        $pdf = Pdf::loadView('tr_atk.print', compact('atk'));

        return $pdf->download('permintaan_atk_' . $atk->id . '.pdf');
    }
}
