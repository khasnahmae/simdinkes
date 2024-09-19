<?php

namespace App\Http\Controllers;

use App\Models\Bbm;
use App\Models\Pegawai;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BbmController extends Controller
{
    // Menampilkan daftar BBM
    public function index()
    {
        $bbm = Bbm::with(['pegawai', 'kendaraan'])->get();
        return view('bbm.index', compact('bbm'));
    }

    // Menampilkan form untuk membuat BBM baru
    public function create()
    {
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        $kendaraan = Kendaraan::orderBy('nopol', 'asc')->get();
        return view('bbm.create', compact('pegawai', 'kendaraan'));
    }

    // Menyimpan data BBM baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pegawai_id' => 'required|exists:pegawai,id',
            'nopol' => 'required|exists:kendaraan,id',
            'nama_kendaraan' => 'required|string',
            'nominal' => 'required|numeric|min:0',
            'status' => 'Pengajuan',
        ]);

        Bbm::create($request->all());

        return redirect()->route('bbm.index')->with('success', 'Permintaan BBM berhasil disimpan.');
    }

    // Menampilkan form untuk mengedit data BBM
    public function edit(Bbm $bbm)
    {
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        $kendaraan = Kendaraan::orderBy('nopol', 'asc')->get();
        return view('bbm.edit', compact('bbm', 'pegawai', 'kendaraan'));
    }

    // Memperbarui data BBM
    public function update(Request $request, Bbm $bbm)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pegawai_id' => 'required|exists:pegawai,id',
            'nopol' => 'required|exists:kendaraan,id',
            'nama_kendaraan' => 'required|string',
            'nominal' => 'required|numeric|min:0',
            'status' => 'Pengajuan',
        ]);

        $bbm->update($request->all());

        return redirect()->route('bbm.index')->with('success', 'Permintaan BBM berhasil diperbarui.');
    }

    // Menghapus data BBM
    public function destroy(Bbm $bbm)
    {
        $bbm->delete();

        return redirect()->route('bbm.index')->with('success', 'Permintaan BBM berhasil dihapus.');
    }
    public function approve($id)
    {
        $bbm = Bbm::find($id);
        $bbm->status = 'Disetujui';
        $bbm->save();

        return redirect()->route('pimpinan.bbm')->with('success', 'Permintaan BBM disetujui');
    }

    public function indexForPimpinan()
    {
        // Ambil data BBM dengan status 'Pengajuan' saja
        $bbm = Bbm::where('status', 'Pengajuan')->get();

        return view('pimpinan.bbm', compact('bbm'));
    }

    public function print($id)
    {
        $bbm = Bbm::findOrFail($id);

        $pdf = Pdf::loadView('bbm.print', compact('bbm'));

        return $pdf->download('permintaan_bbm_' . $bbm->id . '.pdf');
    }
    public function reject($id)
    {
        $bbm = Bbm::find($id);

        if ($bbm) {
            // Update status menjadi 'ditolak'
            $bbm->status = 'Ditolak';
            $bbm->save();

            return redirect()->back()->with('success', 'Pengajuan BBM telah ditolak.');
        }

        return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
    }

}
