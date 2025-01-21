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

        if ($request->hasFile('ttd_kasie')) {
            $ttd_kasie = $request->file('ttd_kasie');
            $filettdkasie = 'TTD' . uniqid() . '.' . $ttd_kasie->getClientOriginalExtension();
            $ttd_kasie->storeAs('public/img', $filettdkasie); // Pastikan path ini benar
        }
        if ($request->hasFile('ttd_pimpinan')) {
            $ttd_pimpinan = $request->file('ttd_pimpinan');
            $filettdpimpinan = 'TTD' . uniqid() . '.' . $ttd_pimpinan->getClientOriginalExtension();
            $ttd_pimpinan->storeAs('public/berita', $filettdpimpinan); // Pastikan path ini benar
        }

        Ttd::create([
            'nama_kasie' => $request->nama_kasie,
            'ttd_kasie' => $filettdkasie,
            'nama_pimpinan' => $request->nama_pimpinan,
            'ttd_pimpinan' => $filettdpimpinan,
        ]);

        return redirect()->route('ttd.index')->with('success', 'Tanda tangan berhasil ditambahkan.');
    }

    public function edit(Ttd $ttd)
    {
        return view('ttd.edit', compact('ttd'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kasie' => 'required|string|max:255',
            'ttd_kasie' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_pimpinan' => 'required|string|max:255',
            'ttd_pimpinan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ttd = Ttd::where('id', $id)->firstOrFail();

        // Jika ada file foto baru, hapus foto lama dan simpan yang baru
        if ($request->hasFile('ttd_kasie')) {
            if ($ttd->ttd_kasie) {
                Storage::delete('public/img/' . $ttd->ttd_kasie);
            }
            $ttd_kasie = $request->file('ttd_kasie');
            $filettdkasie = 'TTD' . time() . '.' . $ttd_kasie->getClientOriginalExtension();
            $ttd_kasie->storeAs('public/img', $filettdkasie);
            $ttd->ttd_kasie = $filettdkasie;
        }
        if ($request->hasFile('ttd_pimpinan')) {
            if ($ttd->ttd_pimpinan) {
                Storage::delete('public/img/' . $ttd->ttd_pimpinan);
            }
            $ttd_pimpinan = $request->file('ttd_pimpinan');
            $filettdpimpinan = 'TTD' . time() . '.' . $ttd_pimpinan->getClientOriginalExtension();
            $ttd_pimpinan->storeAs('public/img', $filettdpimpinan);
            $ttd->ttd_pimpinan = $filettdpimpinan;
        }

        $ttd->update([
            'nama_kasie' => $request->nama_kasie,
            'nama_pimpinan' => $request->nama_pimpinan,
        ]);

        return redirect()->route('ttd.index')->with('success', 'Tanda tangan berhasil diupdate.');
    }
}
