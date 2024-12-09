<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    // Menampilkan semua kegiatan
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('kegiatan.index', compact('kegiatans'));
    }

    // Menampilkan form untuk membuat kegiatan baru
    public function create()
    {
        return view('kegiatan.create');
    }

    // Menyimpan kegiatan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|unique:kegiatans,id', // Pastikan ID unik
            'nama_kegiatan' => 'required|string|max:255',
            'alokasi_dana' => 'required|numeric',
        ]);

        // Membuat record baru dengan UUID yang di-generate
        Kegiatan::create([
            'id' => $request->id, // ID manual diinput
            'uuid' => (string) \Illuminate\Support\Str::uuid(), // Tambahkan UUID
            'nama_kegiatan' => $request->nama_kegiatan,
            'alokasi_dana' => $request->alokasi_dana,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }


    // Menampilkan form untuk mengedit kegiatan
    public function edit($uuid)
    {
        $kegiatan = Kegiatan::where('uuid', $uuid)->firstOrFail();
        return view('kegiatan.edit', compact('kegiatan'));
    }

    // Memperbarui data kegiatan di database
    public function update(Request $request, $uuid)
    {
        $request->validate([
            // 'id' => 'required|string|unique:kegiatans,id,' . $uuid . ',uuid', // Pastikan ID tetap unik
            'id' => 'required|string|unique:kegiatans,id',
            'nama_kegiatan' => 'required|string|max:255',
            'alokasi_dana' => 'required|numeric',
        ]);

        $kegiatan = Kegiatan::where('uuid', $uuid)->firstOrFail();
        $kegiatan->update([
            'id' => $request->id, // Update ID
            'nama_kegiatan' => $request->nama_kegiatan,
            'alokasi_dana' => $request->alokasi_dana,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    // Menghapus kegiatan
    public function destroy($uuid)
    {
        $kegiatan = Kegiatan::where('uuid', $uuid)->firstOrFail();
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
    public function dashboard()
    {
        // Data untuk Dashboard 1 - Serapan Kegiatan
        $kegiatanData = Kegiatan::with('belanja.detail_belanja.transaksi')->get()->map(function ($kegiatan) {
        $alokasiDana = $kegiatan->alokasi_dana;
        $serapan = $kegiatan->belanja->sum('alokasi_dana');
        $sisa = $alokasiDana - $serapan;

        return [
            'id' => $kegiatan->id,
            'nama_kegiatan' => $kegiatan->nama_kegiatan,
            'alokasi_dana' => $alokasiDana,
            'serapan' => $serapan,
            'sisa' => $sisa,
        ];
    });

    // Data untuk Dashboard 2 - Serapan Belanja
        $belanjaData = Belanja::with('detail_belanja.transaksi')->get()->map(function ($belanja) {
        $alokasiDana = $belanja->alokasi_dana;
        $serapan = $belanja->detail_belanja->sum('jumlah');
        $sisa = $alokasiDana - $serapan;

        return [
            'id' => $belanja->id,
            'nama_belanja' => $belanja->nama_belanja,
            'alokasi_dana' => $alokasiDana,
            'serapan' => $serapan,
            'sisa' => $sisa,
        ];
    });

    return view('dashboard.index', compact('kegiatanData', 'belanjaData'));
    }
    public function showDetail($id)
    {
        $belanja = Belanja::with('detail_belanja.transaksi')->findOrFail($id);
        
        return view('dashboard.detail', compact('belanja'));
    }
}
