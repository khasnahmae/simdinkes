<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Feedback;
use App\Models\Galeri;
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
        $berita = Berita::orderBy('created_at', 'desc')->take(3)->get(); // Mengambil 7 berita terbaru
        $feedback = Feedback::orderBy('created_at', 'desc')->take(5)->get()->map(function ($fb) {
            $fb->average_rating = ($fb->kepuasan + $fb->kerapihan + $fb->kecepatan) / 3;
            return $fb;
        });
        // $feedback = Feedback::orderBy('created_at', 'desc')->take(5)->get();
        $totalPenilai = Feedback::count(); // Hitung jumlah data di tabel feedback
        return view('landingnew', compact('kendaraanDipinjam', 'ruanganDipinjam', 'jadwalKadis', 'berita', 'feedback', 'totalPenilai'));
    }

    private function formatViews($number)
    {
        if ($number >= 1000000) {
            return round($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'K';
        }
        return $number;
    }

    public function show($id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            abort(404, 'Berita tidak ditemukan');
        }
        $berita->formatted_views = $this->formatViews($berita->view);
        // Cek apakah berita sudah pernah dilihat dalam session
        $viewed = session()->get('viewed_berita', []);

        if (!in_array($id, $viewed)) {
            $berita->increment('view');
            session()->push('viewed_berita', $id);
        }

        return view('berita-show', compact('berita'));
    }
    public function news()
    {
        $berita = Berita::orderBy('created_at', 'desc')->get();
        foreach ($berita as $brt) {
            $brt->formatted_views = $this->formatViews($brt->view);
        }
        return view('/berita-all', compact('berita'));
    }
    public function search(Request $request)
    {
        // Validasi kata kunci pencarian
        $request->validate([
            'search' => 'required|string|max:255',
        ]);


        // Mencari berita berdasarkan kata kunci
        $query = $request->search;
        $berita = Berita::where('judul', 'like', '%' . $query . '%')
            ->orWhere('subjudul', 'like', '%' . $query . '%')
            ->orWhere('isi', 'like', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($berita as $brt) {
            $brt->formatted_views = $this->formatViews($brt->view);
        }
        return view('search', compact('berita', 'query'));
    }
    public function showGallery()
    {
        $galeri = Galeri::all(); // Ambil semua foto dari tabel
        return view('galeri-all', compact('galeri'));
    }
}
