<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::orderBy('nama_barang', 'asc')->get();
        $batasMinimum = 5;

        // Cek stok barang yang di bawah atau sama dengan batas minimum
        foreach ($barang as $brg) {
            if ($brg->stok <= $batasMinimum) {
                $brg->warning = true; // Tambahkan property 'warning' jika stok hampir habis
            } else {
                $brg->warning = false;
            }
        }
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $barang = Barang::where('uuid', $uuid)->firstOrFail();
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $barang = Barang::where('uuid', $uuid)->firstOrFail();

        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data Barang telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $barang = Barang::where('uuid', $uuid)->firstOrFail();
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data Barang telah dihapus.');
    }
}
