<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
        ]);
    
        // Menyimpan data ke dalam tabel pegawai
        Pegawai::create([
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'bidang' => $request->input('bidang'),
            'uuid' => (string) \Illuminate\Support\Str::uuid(), // Tambahkan UUID

        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil ditambahkan.');
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
        $pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();

        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'bidang' => 'required',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai telah dihapus.');
    }

}
