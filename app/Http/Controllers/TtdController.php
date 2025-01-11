<?php

namespace App\Http\Controllers;

use App\Models\Ttd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TtdController extends Controller
{
    public function index()
    {
        $ttd = Ttd::first(); // Ambil data tanda tangan
        return view('ttd.index', compact('ttd'));
    }

    public function create()
    {
        return view('ttd.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kasie' => 'required|string|max:255',
            'ttd_kasie' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_pimpinan' => 'required|string|max:255',
            'ttd_pimpinan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ttd = new Ttd();
        $ttd->nama_kasie = $request->nama_kasie;

        // Simpan tanda tangan Kasie
        if ($request->hasFile('ttd_kasie')) {
            $ttdKasiePath = $request->file('ttd_kasie')->store('public/img');
            $ttd->ttd_kasie = str_replace('public/', '', $ttdKasiePath);
        }

        $ttd->nama_pimpinan = $request->nama_pimpinan;

        // Simpan tanda tangan Pimpinan
        if ($request->hasFile('ttd_pimpinan')) {
            $ttdPimpinanPath = $request->file('ttd_pimpinan')->store('public/img');
            $ttd->ttd_pimpinan = str_replace('public/', '', $ttdPimpinanPath);
        }

        $ttd->save();


        return redirect()->route('ttd.index')->with('success', 'Tanda tangan berhasil ditambahkan.');
    }

    public function edit(Ttd $ttd)
    {
        return view('ttd.edit', compact('ttd'));
    }

    public function update(Request $request, Ttd $ttd)
    {
        $request->validate([
            'nama_kasie' => 'required|string|max:255',
            'ttd_kasie' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_pimpinan' => 'required|string|max:255',
            'ttd_pimpinan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ttd->nama_kasie = $request->nama_kasie;

        // Update tanda tangan Kasie
        if ($request->hasFile('ttd_kasie')) {
            // Hapus file tanda tangan lama jika ada
            if ($ttd->ttd_kasie) {
                Storage::delete($ttd->ttd_kasie);
            }

            // Simpan tanda tangan baru
            $ttdKasiePath = $request->file('ttd_kasie')->store('public/img');
            $ttd->ttd_kasie = str_replace('public/', '', $ttdKasiePath);
        }

        $ttd->nama_pimpinan = $request->nama_pimpinan;

        // Update tanda tangan Pimpinan
        if ($request->hasFile('ttd_pimpinan')) {
            // Hapus file tanda tangan lama jika ada
            if ($ttd->ttd_pimpinan) {
                Storage::delete($ttd->ttd_pimpinan);
            }

            // Simpan tanda tangan baru
            $ttdPimpinanPath = $request->file('ttd_pimpinan')->store('public/img');
            $ttd->ttd_pimpinan = str_replace('public/', '', $ttdPimpinanPath);
        }

        $ttd->save();

        return redirect()->route('ttd.index')->with('success', 'Tanda tangan berhasil diupdate.');
    }
}
