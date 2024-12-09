<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $belanjas = Belanja::all();
        return view('belanja.index' , compact('belanjas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatan = Kegiatan::orderBy('id','asc')->get();
        return view('belanja.create', compact('kegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|unique:belanjas,id', // Pastikan ID unik
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'nama_belanja' => 'required|string|max:255',
            'alokasi_dana' => 'required|numeric',
        ]);

        Belanja::create([
            'id' => $request->id,
            'kegiatan_id' => $request->kegiatan_id,
            'nama_belanja' => $request->nama_belanja,
            'alokasi_dana' => $request->alokasi_dana,
            'uuid' => (string) \Illuminate\Support\Str::uuid(), // Tambahkan UUID

        ]);

        return redirect()->route('belanja.index')->with('success', 'Data Belanja telah ditambahkan');

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
    public function edit($uuid)
    {
        $belanja = Belanja::where('uuid', $uuid)->firstOrFail();
        $kegiatan = Kegiatan::orderBy('id','asc')->get();
        return view('belanja.edit', compact('belanja', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'id' => 'required|string|unique:belanjas,id', // Pastikan ID unik
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'nama_belanja' => 'required|string|max:255',
            'alokasi_dana' => 'required|numeric',
        ]);

        $belanja = Belanja::where('uuid', $uuid)->firstOrFail();
        $belanja->update([
            'id' => $request->id,
            'kegiatan_id' => $request->kegiatan_id,
            'nama_belanja' => $request->nama_belanja,
            'alokasi_dana' => $request->alokasi_dana,
        ]);

        return redirect()->route('belanja.index')->with('success', 'Data Belanja telah diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $uuid)
    {
        $belanja = Belanja::where('uuid', $uuid)->firstOrFail();
        $belanja->delete();

        return redirect()->route('belanja.index')->with('success', 'Data Belanja telah dihapus');

    }
}
