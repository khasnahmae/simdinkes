<?php

namespace App\Http\Controllers;

use App\Events\BeritaDibuat;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'desc')->get();
        return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
            'isi' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = 'FB' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/berita', $filename); // Pastikan path ini benar
        }
        $berita = Berita::create([
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'isi' => $request->isi,
            'foto' => $filename,
        ]);

        event(new BeritaDibuat($berita));

        return redirect()->route('berita.index')->with('success', 'Data berita telah disimpan');
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
        $berita = Berita::where('id', $id)->firstOrFail();
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
            'isi' => 'required',
        ]);

        $berita = Berita::where('id', $id)->firstOrFail();

        // Jika ada file foto baru, hapus foto lama dan simpan yang baru
        if ($request->hasFile('foto')) {
            if ($berita->foto) {
                Storage::delete('public/berita/' . $berita->foto);
            }
            $foto = $request->file('foto');
            $filename = 'FB' . time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/berita', $filename);
            $berita->foto = $filename;
        }

        $berita->update([
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('berita.index')->with('success', 'Data berita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::where('id', $id)->firstOrFail();

        // Hapus foto jika ada
        if ($berita->foto) {
            Storage::delete('public/berita/' . $berita->foto);
        }

        // Hapus data berita
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Data berita berhasil dihapus');
    }
}
