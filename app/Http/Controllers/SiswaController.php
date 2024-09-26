<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Menampilkan daftar siswa
     */
    public function index()
    {
        $siswa = Siswa::orderBy('updated_at', 'desc')->get();
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Menampilkan form untuk menambahkan data siswa
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Menyimpan data siswa baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string',
            'semester' => 'required|string',
            'sekolah' => 'required|string',
            'tgl_mulai_pkl' => 'required|date',
            'tgl_selesai_pkl' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        // Jika ada file foto, simpan file dan ambil nama filenya
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = 'FTM_' . time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/siswa', $filename);
        }

        // Menyimpan data siswa
        Siswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'semester' => $request->semester,
            'sekolah' => $request->sekolah,
            'tgl_mulai_pkl' => $request->tgl_mulai_pkl,
            'tgl_selesai_pkl' => $request->tgl_selesai_pkl,
            'foto' => $filename,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Menampilkan detail siswa
     */
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.detail', compact('siswa'));
    }

    /**
     * Menampilkan form untuk edit data siswa
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update data siswa yang sudah ada
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string',
            'semester' => 'required|string',
            'sekolah' => 'required|string',
            'tgl_mulai_pkl' => 'required|date',
            'tgl_selesai_pkl' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        $siswa = Siswa::findOrFail($id);

        // Jika ada file foto baru, hapus foto lama dan simpan yang baru
        if ($request->hasFile('foto')) {
            if ($siswa->foto) {
                Storage::delete('public/siswa/' . $siswa->foto);
            }
            $foto = $request->file('foto');
            $filename = 'FTM_' . time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/siswa', $filename);
            $siswa->foto = $filename;
        }

        // Update data siswa
        $siswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'semester' => $request->semester,
            'sekolah' => $request->sekolah,
            'tgl_mulai_pkl' => $request->tgl_mulai_pkl,
            'tgl_selesai_pkl' => $request->tgl_selesai_pkl,
            'foto' => $filename,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * Menghapus data siswa
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Hapus foto jika ada
        if ($siswa->foto) {
            Storage::delete('public/siswa/' . $siswa->foto);
        }

        // Hapus data siswa
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
