<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Feedback;
use App\Models\JadwalKadis;
use App\Models\PeminjamanKendaraan;
use App\Models\PeminjamanRuangan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing()
    {
        $currentTime = now();

        $kendaraanDipinjam = PeminjamanKendaraan::whereDate('mulai', '>=', now()->toDateString())
            ->where('selesai', '>=', $currentTime)
            ->orderBy('mulai', 'asc')
            ->get();
        $ruanganDipinjam = PeminjamanRuangan::whereDate('mulai', '>=', now()->toDateString())
            ->where('selesai', '>=', $currentTime)
            ->orderBy('mulai', 'asc')
            ->get();
        $jadwalKadis = JadwalKadis::whereDate('tgl_selesai', '>=', now()->toDateString())
            ->orderBy('tgl_mulai', 'asc')
            ->get();
        $berita = Berita::orderBy('created_at', 'desc')->take(7)->get(); // Mengambil 7 berita terbaru
        $totalPenilai = Feedback::count(); // Hitung jumlah data di tabel feedback
        return view('landing', compact('kendaraanDipinjam', 'ruanganDipinjam', 'jadwalKadis', 'berita', 'totalPenilai'));
    }
    public function show($id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            abort(404, 'Berita tidak ditemukan');
        }

        return view('berita-show', compact('berita'));
    }
}
