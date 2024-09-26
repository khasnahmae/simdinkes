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

    public function show($id)
    {
        $bbm = Bbm::findOrFail($id); // Temukan BBM berdasarkan ID
        return view('bbm.show', compact('bbm')); // Tampilkan view untuk detail BBM
    }

    // Menyimpan data BBM baru
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'nopol' => 'required|exists:kendaraan,id',
            'nama_kendaraan' => 'required|string',
            'jenis_bbm' => 'required|string',
            'nominal' => 'required|numeric|min:0',
            'status' => 'Pengajuan',
        ]);

          // Tambahkan 'tanggal' secara manual
        $data = $request->all();
        $data['tanggal'] = now(); // Menyimpan tanggal saat ini

        // Simpan data ke database
        Bbm::create($data);


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
            'pegawai_id' => 'required|exists:pegawai,id',
            'nopol' => 'required|exists:kendaraan,id',
            'nama_kendaraan' => 'required|string',
            'jenis_bbm' => 'required|string',
            'nominal' => 'required|numeric|min:0',
            'status' => 'Pengajuan',
        ]);

        // Tambahkan 'tanggal' secara manual dengan waktu saat ini
        $data = $request->all();
        $data['tanggal'] = now(); // Update 'tanggal' dengan waktu sekarang

        // Update data di database
        $bbm->update($data);

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

        return redirect()->route('bbm.pengajuan')->with('success', 'Permintaan BBM disetujui');
    }

    public function pengajuan()
    {
        // Ambil data BBM dengan status 'Pengajuan' saja
        $bbm = Bbm::where('status', 'Pengajuan')->get();
        return view('pengajuan.bbm', compact('bbm'));

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

            return redirect()->back()->with('success', 'Permintaan BBM telah ditolak.');
        }

        return redirect()->back()->with('error', 'Permintaan tidak ditemukan.');
    }

}
