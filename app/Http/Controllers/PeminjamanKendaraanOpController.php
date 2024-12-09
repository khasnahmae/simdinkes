<?php
namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pegawai;
use App\Models\PeminjamanKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanKendaraanOpController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::all();

        // Mengambil semua peminjaman untuk waktu saat ini
        $currentTime = now();
        $peminjamanAktif = PeminjamanKendaraan::where('mulai', '<=', $currentTime)
            ->where('selesai', '>=', $currentTime)
            ->get();

        return view('peminjaman-kendaraanop.index', compact('kendaraans', 'peminjamanAktif'));
    }

    public function create()
    {
        $kendaraan = Kendaraan::orderBy('nopol', 'asc')->get();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        return view('peminjaman-kendaraanop.create', compact('kendaraan', 'pegawai'));
    }

    
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraan,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai', // Validasi bahwa selesai harus setelah mulai
            'keterangan' => 'required',
        ]);

        // Cari data pegawai yang sesuai dengan user yang sedang login
        $pegawai = Pegawai::where('user_id', auth()->id())->first();

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        $kendaraan_id = $request->kendaraan_id;
        $mulai = $request->mulai;
        $selesai = $request->selesai;
        $keterangan = $request->keterangan;

        // Cek apakah kendaraan sudah dibooking untuk waktu yang dipilih
        $peminjamanExist = PeminjamanKendaraan::where('kendaraan_id', $kendaraan_id)
            ->where(function ($query) use ($mulai, $selesai) {
                $query->whereBetween('mulai', [$mulai, $selesai])
                    ->orWhereBetween('selesai', [$mulai, $selesai])
                    ->orWhere(function ($query) use ($mulai, $selesai) {
                        $query->where('mulai', '<=', $mulai)
                            ->where('selesai', '>=', $selesai);
                    });
            })
            ->exists();

        if ($peminjamanExist) {
            return redirect()->back()->with('error', 'Kendaraan sudah dibooking untuk waktu tersebut.');
        }

        // Simpan data peminjaman kendaraan
        PeminjamanKendaraan::create([
            'kendaraan_id' => $kendaraan_id,
            'pegawai_id' => $pegawai->id, // Ambil pegawai berdasarkan user login
            'mulai' => $mulai,
            'selesai' => $selesai,
            'keterangan' => $keterangan,
            'status' => 'booked',
        ]);

        return redirect()->route('peminjaman-kendaraanop.index')->with('success', 'Kendaraan berhasil dipesan.');
    }


    public function detail($uuid)
    {

        // Mendapatkan waktu saat ini
        $currentTime = now();

        // Ambil data kendaraan berdasarkan UUID
        $kendaraan = Kendaraan::where('uuid', $uuid)->firstOrFail();

        // Ambil semua peminjaman untuk kendaraan tertentu
        $peminjaman = PeminjamanKendaraan::where('kendaraan_id', $kendaraan->id) // Pastikan ini menggunakan ID kendaraan
                        ->orderByRaw("CASE 
                            WHEN mulai <= '$currentTime' AND selesai >= '$currentTime' THEN 0 
                            WHEN mulai > '$currentTime' THEN 1 
                            ELSE 2 
                        END, mulai ASC")
                        ->get();

        return view('peminjaman-kendaraanop.detail', compact('peminjaman', 'kendaraan', 'currentTime'));
    }




    public function edit(string $uuid)
    {
        
        $peminjaman = PeminjamanKendaraan::where('uuid', $uuid)->firstOrFail();       
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        $kendaraan = Kendaraan::orderBy('nopol', 'asc')->get();
        return view('peminjaman-kendaraanop.edit', compact('peminjaman', 'pegawai', 'kendaraan'));
    }

    
    public function update(Request $request, string $uuid)
    {
        $peminjaman = PeminjamanKendaraan::where('uuid', $uuid)->firstOrFail();

        // Validasi data input
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraan,id',
            'keterangan' => 'required',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
        ]);

        // Cari data pegawai yang sesuai dengan user yang sedang login
        $pegawai = Pegawai::where('user_id', auth()->id())->first();

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        $kendaraan_id = $request->kendaraan_id;
        $mulai = $request->mulai;
        $selesai = $request->selesai;
        $keterangan = $request->keterangan;

        // Cek apakah kendaraan sudah dibooking untuk waktu yang dipilih
        $peminjamanExist = PeminjamanKendaraan::where('kendaraan_id', $kendaraan_id)
            ->where('uuid', '!=', $peminjaman->uuid) // Pastikan tidak memeriksa peminjaman yang sedang diupdate
            ->where(function ($query) use ($mulai, $selesai) {
                $query->whereBetween('mulai', [$mulai, $selesai])
                    ->orWhereBetween('selesai', [$mulai, $selesai])
                    ->orWhere(function ($query) use ($mulai, $selesai) {
                        $query->where('mulai', '<=', $mulai)
                            ->where('selesai', '>=', $selesai);
                    });
            })
            ->exists();

        if ($peminjamanExist) {
            return redirect()->back()->with('error', 'Kendaraan sudah dibooking untuk waktu tersebut.');
        }

        // Perbarui data peminjaman
        $peminjaman->update([
            'kendaraan_id' => $kendaraan_id,
            'pegawai_id' => $pegawai->id, // Ambil pegawai berdasarkan user login
            'keterangan' => $keterangan,
            'mulai' => $mulai,
            'selesai' => $selesai,
        ]);

        return redirect()->route('peminjaman-kendaraanop.index')->with('success', 'Peminjaman kendaraan berhasil diperbarui.');
    }


    public function destroy(string $uuid)
    {
        $peminjaman = PeminjamanKendaraan::where('uuid', $uuid)->firstOrFail();
        $peminjaman->delete();

        return redirect()->route('peminjaman-kendaraanop.index')->with('success', 'Peminjaman kendaraan berhasil dihapus.');
    }
}

