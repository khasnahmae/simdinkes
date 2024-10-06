<?php

namespace App\Http\Controllers;

use App\Models\Bbm;
use App\Models\Kendaraan;
use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Tr_BbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bbm = Bbm::with(['pegawai', 'kendaraan'])
            ->where('pegawai_id', auth()->id()) // Menampilkan hanya data yang dibuat oleh user yang sedang login
            ->orderBy('created_at', 'desc') // Mengurutkan data berdasarkan tanggal pembuatan, yang terbaru di atas
            ->get();
    
        return view('tr_bbm.index', compact('bbm'));
    }
    


    // Menampilkan form untuk membuat BBM baru
    public function create()
    {
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        $kendaraan = Kendaraan::orderBy('nopol', 'asc')->get();
        return view('tr_bbm.create', compact('pegawai', 'kendaraan'));
    }

    public function show($id)
    {
        $bbm = Bbm::findOrFail($id); // Temukan BBM berdasarkan ID
        return view('tr_bbm.show', compact('bbm')); // Tampilkan view untuk detail BBM
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


        return redirect()->route('tr_bbm.index')->with('success', 'Permintaan BBM berhasil disimpan.');
    }

    // Menampilkan form untuk mengedit data BBM
    public function edit(string $uuid)
    {
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        $kendaraan = Kendaraan::orderBy('nopol', 'asc')->get();
        return view('tr_bbm.edit', compact('bbm', 'pegawai', 'kendaraan'));
    }

    // Memperbarui data BBM
    public function update(Request $request, string $uuid)
    {
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail();
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

        return redirect()->route('tr_bbm.index')->with('success', 'Permintaan BBM berhasil diperbarui.');
    }

    // Menghapus data BBM
    public function destroy(string $uuid)
    {
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail();
        $bbm->delete();

        return redirect()->route('tr_bbm.index')->with('success', 'Permintaan BBM berhasil dihapus.');
    }
    public function print($uuid)
    {
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail();

        $pdf = Pdf::loadView('tr_bbm.print', compact('bbm'));

        return $pdf->download('permintaan_bbm_' . $bbm->id . '.pdf');
    }
}
