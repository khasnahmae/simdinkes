<?php

namespace App\Http\Controllers;

use App\Models\Atk;
use App\Models\Barang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PeminjamanAtkController extends Controller
{
    public function index()
    {
        $peminjaman_atk = Atk::with(['pegawai', 'barang'])->get();
        return view('peminjaman_atk.index', compact('peminjaman_atk'));
    }

    public function create()
    {
         // Mengambil data pegawai dan mengurutkannya berdasarkan nama
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();

        // Mengambil data barang dan mengurutkannya berdasarkan nama_barang
        $barang = Barang::orderBy('nama_barang', 'asc')->get();
        return view('peminjaman_atk.create', compact('pegawai', 'barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pegawai_id' => 'required|exists:pegawai,id',
            'barang_id' => 'required|exists:barang,id',
            'jumlah_barang' => 'required|integer',
            'status' => 'Pengajuan',
        ]);
    
        // Temukan barang berdasarkan ID
        $barang = Barang::find($request->barang_id);
    
        // Cek apakah stok barang mencukupi
        if ($barang->stok < $request->jumlah_barang) {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
        }
    
        // Kurangi stok barang
        $barang->stok -= $request->jumlah_barang;
        $barang->save(); // Simpan perubahan stok barang
    
        // Simpan data peminjaman
        Atk::create($request->all());
    
        return redirect()->route('peminjaman_atk.index')->with('success', 'Data peminjaman ATK berhasil ditambahkan, stok barang telah dikurangi.');
    }

    public function edit(Atk $peminjaman_atk)
    {
        $pegawai = Pegawai::all();
        $barang = Barang::all();
        return view('peminjaman_atk.edit', compact('peminjaman_atk', 'pegawai', 'barang'));
    }

    public function update(Request $request, Atk $peminjaman_atk)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pegawai_id' => 'required|exists:pegawai,id',
            'barang_id' => 'required|exists:barang,id',
            'jumlah_barang' => 'required|integer|min:1',
            'status' => 'Pengajuan',
        ]);

        // Gunakan parameter model yang sudah disuntikkan
        $transaksi = $peminjaman_atk;
        $barang = Barang::findOrFail($request->barang_id);

        // Hitung selisih jumlah barang
        $selisih = $request->jumlah_barang - $transaksi->jumlah_barang;

        // Perbarui stok barang
        $barang->stok += $transaksi->jumlah_barang; // Mengembalikan stok sebelumnya
        $barang->stok -= $request->jumlah_barang; // Mengurangi stok sesuai jumlah baru
        $barang->save();

        // Perbarui transaksi
        $transaksi->tanggal = $request->tanggal;
        $transaksi->pegawai_id = $request->pegawai_id;
        $transaksi->barang_id = $request->barang_id;
        $transaksi->jumlah_barang = $request->jumlah_barang;
        $transaksi->save();

        return redirect()->route('peminjaman_atk.index')->with('success', 'Data peminjaman ATK berhasil diupdate, stok barang telah diperbarui.');
    }

    public function destroy(Atk $peminjaman_atk)
    {
        $peminjaman_atk->delete();
        return redirect()->route('peminjaman_atk.index')->with('success', 'Data peminjaman ATK berhasil dihapus.');
    }
    public function approve($id)
    {
        $atk = Atk::find($id);
        $atk->status = 'Disetujui';
        $atk->save();

        return redirect()->route('pimpinan.atk')->with('success', 'Permintaan ATK disetujui');
    }

    public function indexForPimpinan()
    {
        // Ambil data atk dengan status 'Pengajuan' saja
        $atk = Atk::where('status', 'Pengajuan')->get();

        return view('pimpinan.atk', compact('atk'));
    }

    public function print($id)
    {
        $atk = Atk::findOrFail($id);

        $pdf = Pdf::loadView('peminjaman_atk.print', compact('atk'));

        return $pdf->download('permintaan_atk_' . $atk->id . '.pdf');
    }

}
