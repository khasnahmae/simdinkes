<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use App\Models\Barang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class AtkController extends Controller
{
    public function index()
    {
        $atk = Atk::with(['pegawai', 'barang'])->get();
        return view('atk.index', compact('atk'));
    }

    public function create()
    {
         // Mengambil data pegawai dan mengurutkannya berdasarkan nama
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();

        // Mengambil data barang dan mengurutkannya berdasarkan nama_barang
        $barang = Barang::orderBy('nama_barang', 'asc')->get();
        return view('atk.create', compact('pegawai', 'barang'));
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
        ]);
    
        return redirect()->route('atk.index')->with('success', 'Data permintaan ATK berhasil ditambahkan, stok barang telah dikurangi.');
    }

    public function edit(Atk $atk)
    {
        $pegawai = Pegawai::all();
        $barang = Barang::all();
        return view('atk.edit', compact('atk', 'pegawai', 'barang'));
    }

    public function update(Request $request, Atk $atk)
    {
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

            return redirect()->route('atk.index')->with('success', 'Data permintaan ATK berhasil diupdate, stok barang telah diperbarui.');
        } else {
            // Jika stok tidak mencukupi
            return redirect()->route('atk.index')->with('error', 'Stok barang tidak mencukupi untuk memperbarui transaksi.');
        }
    }

    public function destroy(Atk $atk)
    {
        // Temukan barang yang terkait dengan transaksi
        $barang = Barang::findOrFail($atk->barang_id);

        // Kembalikan stok barang sebelum menghapus transaksi
        $barang->stok += $atk->jumlah_barang; // Tambahkan kembali jumlah yang diminta
        $barang->save();

        // Hapus transaksi
        $atk->delete();

        return redirect()->route('atk.index')->with('success', 'Data permintaan ATK berhasil dihapus, stok barang telah diperbarui.');
    }
    public function approve($id)
    {
        if (auth()->user()->level !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        $atk = Atk::find($id);
        $atk->status = 'Disetujui';
        $atk->save();

        return redirect()->route('atk.pengajuan')->with('success', 'Permintaan ATK disetujui');
    }

    public function pengajuan()
    {
        if (auth()->user()->level !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        // Ambil data atk dengan status 'Pengajuan' saja
        $atk = Atk::where('status', 'Pengajuan')->get();

        return view('pengajuan.atk', compact('atk'));
    }

    public function print($id)
    {
        $atk = Atk::findOrFail($id);

        $pdf = Pdf::loadView('atk.print', compact('atk'));

        return $pdf->download('permintaan_atk_' . $atk->id . '.pdf');
    }
    public function reject($id)
    {
        if (auth()->user()->level !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        $atk = Atk::find($id);

        if ($atk) {
            // Update status menjadi 'ditolak'
            $atk->status = 'Ditolak';
            $atk->save();

            return redirect()->back()->with('success', 'Permintaan ATK telah ditolak.');
        }

        return redirect()->back()->with('error', 'Permintaan tidak ditemukan.');
    }
}
