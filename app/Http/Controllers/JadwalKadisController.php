<?php

namespace App\Http\Controllers;

use App\Models\JadwalKadis;
use Illuminate\Http\Request;

class JadwalKadisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal_kadis = JadwalKadis::all();
        return view('jadis.index', compact('jadwal_kadis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'lokasi' => 'required',
        ]);

        JadwalKadis::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('jadis.index')->with('success', 'Jadwal Kadis berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        $jadwal_kadis = JadwalKadis::findOrFail($id);
        return view('jadis.edit', compact('jadwal_kadis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'lokasi' => 'required',
        ]);

        $jadwal_kadis = JadwalKadis::findOrFail($id);
        $jadwal_kadis->update([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('jadis.index')->with('success', 'Jadwal Kadis berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal_kadis = JadwalKadis::findOrFail($id);
        $jadwal_kadis->delete();

        return redirect()->route('jadis.index')->with('success', 'Jadwal Kadis berhasil dihapus.');
    }
}
