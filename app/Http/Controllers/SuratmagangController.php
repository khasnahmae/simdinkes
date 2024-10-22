<?php

namespace App\Http\Controllers;

use App\Models\SuratMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class SuratmagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratmagang = SuratMagang::orderBy('created_at' , 'asc')->get();
        return view('suratmagang.index' , compact('suratmagang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suratmagang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kampus' => 'required|string',
            'file_surat' => 'required|mimes:pdf|max:10000',
        ]);

        if ($request->hasFile('file_surat')) {
            $file_surat = $request->file('file_surat');
            $filename = 'SM_'. time() . '.' . $file_surat->getClientOriginalExtension();
            $file_surat->storeAs('public/suratmagang', $filename);
        }
        SuratMagang::create([
            'nama_kampus' => $request->nama_kampus,
            'file_surat' => $filename,
            'uuid' => (string) \Illuminate\Support\Str::uuid(), // Tambahkan UUID
        ]);

        return redirect()->route('suratmagang.index')->with('success', 'File Surat Magang berhasil ditambahkan');

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
    public function edit($uuid)
    {
        $suratmagang = SuratMagang::where('uuid', $uuid)->firstOrFail();
        return view('suratmagang.edit', compact('suratmagang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'nama_kampus' => 'required|string',
            'file_surat' => 'nullable|mimes:pdf|max:10000', // file_surat tidak wajib diisi
        ]);

        $surat_magang = SuratMagang::where('uuid', $uuid)->firstOrFail();

        // Jika ada file yang di-upload, hapus file lama dan upload file baru
        if ($request->hasFile('file_surat')) {
            if ($surat_magang->file_surat) {
                Storage::delete('public/suratmagang/' . $surat_magang->file_surat);
            }
            $file_surat = $request->file('file_surat');
            $filename = 'SM_' . time() . '.' . $file_surat->getClientOriginalExtension();
            $file_surat->storeAs('public/suratmagang', $filename);
            $surat_magang->file_surat = $filename;
        }

        // Update data lainnya
        $surat_magang->update([
            'nama_kampus' => $request->nama_kampus,
        ]);

        return redirect()->route('suratmagang.index')->with('success', 'Surat Magang berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $uuid)
    {
        $surat_magang = SuratMagang::where('uuid', $uuid)->firstOrFail();

        if ($surat_magang->file_surat) {
            Storage::delete('public/suratmagang/' . $surat_magang->file_surat);
        }
        $surat_magang->delete();
        return redirect()->route('suratmagang.index')->with('success', 'Surat Magang berhasil dihapus');
    }
}
