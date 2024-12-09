<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailBelanja;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::with('detail_belanja')->get(); // Mengambil semua transaksi dengan relasi ke detail belanja
        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detail_belanjas = DetailBelanja::orderBy('id', 'asc')->get(); // Mengambil detail belanja untuk form create
        return view('transaksi.create', compact('detail_belanjas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'detail_belanja_id' => 'required',
            'nama_kegiatan' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
            'nama_penyedia' => 'required|string',
        ]);

        // Ambil data detail belanja dari database
        $detailBelanja = DetailBelanja::findOrFail($request->detail_belanja_id);

        // Cek apakah harga yang diinput melebihi harga dari tabel detail belanja
        if ($request->harga > $detailBelanja->harga) {
            return redirect()->back()->withErrors(['harga' => 'Harga melebihi anggaran yang ditetapkan.']);
        }

        // Simpan transaksi jika validasi lulus
        Transaksi::create([
            'detail_belanja_id' => $request->detail_belanja_id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'qty' => $request->qty,
            'jumlah' => $request->harga * $request->qty,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'nama_penyedia' => $request->nama_penyedia,
            'uuid' => (string) \Illuminate\Support\Str::uuid(), // Tambahkan UUID
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }



    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $transaksi = Transaksi::where('uuid', $uuid)->with('detail_belanja')->firstOrFail();
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
    {
        $transaksi = Transaksi::where('uuid', $uuid)->firstOrFail();
        $detail_belanjas = DetailBelanja::orderBy('id', 'asc')->get();
        return view('transaksi.edit', compact('transaksi', 'detail_belanjas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        // Validasi input
        $request->validate([
            'detail_belanja_id' => 'required',
            'nama_kegiatan' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
            'nama_penyedia' => 'required|string',
        ]);

        // Ambil transaksi yang akan di-update
        $transaksi = Transaksi::where('uuid', $uuid)->firstOrFail();


        // Ambil data detail belanja dari database
        $detailBelanja = DetailBelanja::findOrFail($request->detail_belanja_id);

        // Cek apakah harga yang diinput melebihi harga dari tabel detail belanja
        if ($request->harga > $detailBelanja->harga) {
            return redirect()->back()->withErrors(['harga' => 'Harga melebihi anggaran yang ditetapkan.']);
        }

        // Update transaksi jika validasi lulus
        $transaksi->update([
            'detail_belanja_id' => $request->detail_belanja_id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'qty' => $request->qty,
            'jumlah' => $request->harga * $request->qty,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'nama_penyedia' => $request->nama_penyedia,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        $transaksi = Transaksi::where('uuid', $uuid)->firstOrFail();
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi telah dihapus');
    }
}
