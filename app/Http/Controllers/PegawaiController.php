<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
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
        $users = User::doesntHave('pegawai')->get(); // Ambil user yang belum ada di tabel pegawai
        return view('pegawai.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'required|exists:user,id',
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
        ]);
    
        // Menyimpan data ke dalam tabel pegawai
        Pegawai::create([
            'user_id' => $request->user_id,
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
        $pegawai = Pegawai::where('uuid', $uuid)->firstOrFail(); // Cari berdasarkan UUID
        $users = User::doesntHave('pegawai')->orWhere('id', $pegawai->user_id)->get(); // User yang belum terpakai atau user saat ini
    
        return view('pegawai.edit', compact('pegawai', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();

        $request->validate([
            // 'user_id' => 'required|exists:user,id',
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
        ]);
    
        // Update data pegawai
        $pegawai->update([
            // 'user_id' => $request->user_id,
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'bidang' => $request->input('bidang'),
        ]);

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
