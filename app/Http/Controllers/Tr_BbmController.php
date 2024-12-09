<?php

namespace App\Http\Controllers;

use App\Models\Bbm;
use App\Models\Kendaraan;
use App\Models\Pegawai;
use App\Models\Ttd;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Tr_BbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data BBM yang hanya dibuat oleh user yang sedang login (operator)
        $bbm = Bbm::with(['pegawai', 'kendaraan'])
            ->whereHas('pegawai', function ($query) {
                $query->where('user_id', auth()->id()); // Filter berdasarkan user_id yang login
            })
            ->orderBy('created_at', 'desc') // Data terbaru di atas
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

    public function store(Request $request)
    {
        $request->validate([
            'nopol' => 'required|exists:kendaraan,id',
            'nama_kendaraan' => 'required|string',
            'jenis_bbm' => 'required|string',
            'nominal' => 'required|numeric|min:0',
        ]);

        // Cari data pegawai yang sesuai dengan user yang sedang login
        $pegawai = Pegawai::where('user_id', auth()->id())->first();

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        // Simpan data BBM dengan pegawai_id yang sesuai
        Bbm::create([
            'nopol' => $request->nopol,
            'nama_kendaraan' => $request->nama_kendaraan,
            'jenis_bbm' => $request->jenis_bbm,
            'nominal' => $request->nominal,
            'pegawai_id' => $pegawai->id, // Isi pegawai_id dari data pegawai yang ditemukan
            'tanggal' => now(),
            'status' => 'Pengajuan',
        ]);

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
            'nopol' => 'required|exists:kendaraan,id',
            'nama_kendaraan' => 'required|string',
            'jenis_bbm' => 'required|string',
            'nominal' => 'required|numeric|min:0',
        ]);

         // Ambil semua data dari input
        $data = $request->except('pegawai_id'); // Pastikan input tidak mencantumkan pegawai_id
        $data['pegawai_id'] = $bbm->pegawai_id; // Tetap gunakan pegawai_id yang sudah ada
        $data['status'] = $bbm->status; // Tetap gunakan status yang ada, tidak mengubah status

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
        $ttd = Ttd::first();

        $pdf = Pdf::loadView('tr_bbm.print', compact('bbm', 'ttd'));

        return $pdf->download('permintaan_bbm_' . $bbm->id . '.pdf');
    }
}
