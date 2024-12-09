<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nopol' => 'required|unique:kendaraan',
            'nama_kendaraan' => 'required',
            'jenis' => 'required',
            'tipe' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'jenis_bbm' => 'required|string',
            'bbm_limit' => 'required|numeric',
            'uuid' => (string) \Illuminate\Support\Str::uuid(), // Tambahkan UUID
        ]);

        Kendaraan::create($request->all());

        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil ditambahkan.');
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
        $kendaraan = Kendaraan::where('uuid', $uuid)->firstOrFail();
        return view('kendaraan.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $kendaraan = Kendaraan::where('uuid', $uuid)->firstOrFail();

        $request->validate([
            'nopol' => 'required|unique:kendaraan,nopol,'.$kendaraan->id,
            'nama_kendaraan' => 'required',
            'jenis' => 'required',
            'tipe' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'jenis_bbm' => 'required|string',
            'bbm_limit' => 'required|numeric',

        ]);

        $kendaraan->update($request->all());

        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $kendaraan = Kendaraan::where('uuid', $uuid)->firstOrFail();
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan telah dihapus.');
    }
}
