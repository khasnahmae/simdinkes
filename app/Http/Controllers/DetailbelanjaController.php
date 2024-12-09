<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use App\Models\DetailBelanja;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DetailBelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail_belanjas = DetailBelanja::all();
        return view('detail_belanja.index', compact('detail_belanjas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $belanjas = Belanja::orderBy('id', 'asc')->get();
        return view('detail_belanja.create', compact('belanjas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'belanja_id' => 'required|exists:belanjas,id', // Validasi foreign key
            'nama_kegiatan' => 'required|string|max:255',
            'qty' => 'required|integer',
            'satuan' => 'required|string|max:100',
            'harga' => 'required|numeric',
        ]);

        // Menghitung jumlah (qty * harga)
        $jumlah = $request->qty * $request->harga;

        DetailBelanja::create([
            'uuid' => (string) Str::uuid(),
            'belanja_id' => $request->belanja_id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'qty' => $request->qty,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'jumlah' => $jumlah,
        ]);

        return redirect()->route('detail_belanja.index')->with('success', 'Detail Belanja berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
    {
        $detail_belanja = DetailBelanja::where('uuid', $uuid)->firstOrFail();
        $belanjas = Belanja::orderBy('id', 'asc')->get();
        return view('detail_belanja.edit', compact('detail_belanja', 'belanjas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'belanja_id' => 'required|exists:belanjas,id',
            'nama_kegiatan' => 'required|string|max:255',
            'qty' => 'required|integer',
            'satuan' => 'required|string|max:100',
            'harga' => 'required|numeric',
        ]);

        $detail_belanja = DetailBelanja::where('uuid', $uuid)->firstOrFail();

        // Menghitung jumlah (qty * harga)
        $jumlah = $request->qty * $request->harga;

        $detail_belanja->update([
            'belanja_id' => $request->belanja_id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'qty' => $request->qty,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'jumlah' => $jumlah,
        ]);

        return redirect()->route('detail_belanja.index')->with('success', 'Detail Belanja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        $detail_belanja = DetailBelanja::where('uuid', $uuid)->firstOrFail();
        $detail_belanja->delete();

        return redirect()->route('detail_belanja.index')->with('success', 'Detail Belanja berhasil dihapus.');
    }
    public function getDetailBelanja($id)
    {
        $detailBelanja = DetailBelanja::find($id);

        if ($detailBelanja) {
            return response()->json([
                'nama_kegiatan' => $detailBelanja->nama_kegiatan,
                'satuan' => $detailBelanja->satuan,
                'harga' => $detailBelanja->harga,
                'jumlah' => $detailBelanja->jumlah,
            ]);
        }

        return response()->json(['error' => 'Data tidak ditemukan'], 404);
    }

}
