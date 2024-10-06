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
        $jadwal_kadis = JadwalKadis::orderBy('created_at', 'desc')->get(); // Mengurutkan data berdasarkan tanggal pembuatan, yang terbaru di atas
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
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'keterangan' => 'required',
            'lokasi' => 'required',
        ]);

        JadwalKadis::create([
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'keterangan' => $request->keterangan,
            'lokasi' => $request->lokasi,
            'uuid' => (string) \Illuminate\Support\Str::uuid(), // Tambahkan UUID

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
    public function edit(string $uuid)
    {
        $jadwal_kadis = JadwalKadis::where('uuid', $uuid)->firstOrFail();
        return view('jadis.edit', compact('jadwal_kadis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $request->validate([
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'keterangan' => 'required',
            'lokasi' => 'required',
        ]);

        $jadwal_kadis = JadwalKadis::where('uuid', $uuid)->firstOrFail();
        $jadwal_kadis->update([
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'keterangan' => $request->keterangan,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('jadis.index')->with('success', 'Jadwal Kadis berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $jadwal_kadis = JadwalKadis::where('uuid', $uuid)->firstOrFail();
        $jadwal_kadis->delete();

        return redirect()->route('jadis.index')->with('success', 'Jadwal Kadis berhasil dihapus.');
    }
}
