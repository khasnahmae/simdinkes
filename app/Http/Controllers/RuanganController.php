<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangan = Ruangan::orderBy('nama' , 'asc')->get();
        return view('ruangan.index', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
        ]);

        Ruangan::create([
            'nama' => $request->nama,
            'uuid' => (string) \Illuminate\Support\Str::uuid(), // Tambahkan UUID
        ]);

        return redirect()->route('ruangan.index')->with('success' , 'Data Ruangan berhasil ditambahkan');
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
        $ruangan = Ruangan::where('uuid', $uuid)->firstOrFail();
        return view('ruangan.edit', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $ruangan = Ruangan::where('uuid' , $uuid)->firstOrFail();
        $request->validate([
            'nama' => 'required|string',
        ]);
        $ruangan->update($request->all());
        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
       $ruangan = Ruangan::where('uuid', $uuid)->firstOrFail();
       $ruangan->delete();

       return redirect()->route('ruangan.index')->with('success' , 'Data Ruangan berhasil dihapus');
    }
}
