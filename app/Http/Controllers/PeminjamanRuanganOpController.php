<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuangan;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanRuanganOpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Mengambil semua peminjaman untuk waktu saat ini
        $currentTime = now();
        $peminjamanAktif = PeminjamanRuangan::whereDate('mulai', '>=', now()->toDateString())
            ->where('selesai', '>=', $currentTime)
            ->orderBy('mulai', 'asc')
            ->get();


        return view('peminjaman-ruanganop.index', compact('currentTime', 'peminjamanAktif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruangan = Ruangan::orderBy('nama', 'asc')->get();
        return view('peminjaman-ruanganop.create', compact('ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'ruangan_id' => 'required|exists:ruangans,id',
            'mulai' => 'required|date|',
            'selesai' => 'required|date|after:mulai',
            'keterangan' => 'nullable|string',
        ]);


        $ruangan_id = $request->ruangan_id;
        $mulai = $request->mulai;
        $selesai = $request->selesai;

        // Cek apakah ruangan sudah dibooking untuk waktu yang dipilih
        $peminjamanExist = PeminjamanRuangan::where('ruangan_id', $ruangan_id)
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
            return redirect()->back()->with('error', 'Ruangan sudah dibooking untuk waktu tersebut.');
        }

        PeminjamanRuangan::create([
            'ruangan_id' => $ruangan_id,
            'user_id' => Auth::id(),
            'mulai' => $mulai,
            'selesai' => $selesai,
            'keterangan' => $request->keterangan,
            'status' => 'booked',
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
        ]);

        return redirect()->route('peminjaman-ruanganop.index')->with('success', 'Ruangan berhasil dipinjam.');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $currentTime = now();

        $peminjaman = PeminjamanRuangan::all();

        return view('peminjaman-ruanganop.detail', compact('peminjaman', 'currentTime'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $ruangan = Ruangan::orderBy('nama', 'asc')->get();
        $peminjaman = PeminjamanRuangan::where('uuid', $uuid)->firstOrFail();
        return view('peminjaman-ruanganop.edit', compact('peminjaman', 'ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $peminjaman = PeminjamanRuangan::where('uuid', $uuid)->firstOrFail();
        $request->validate([
            'ruangan_id' => 'required|exists:ruangans,id',
            'mulai' => 'required|date|',
            'selesai' => 'required|date|after:mulai',
            'keterangan' => 'nullable|string',
        ]);

        $ruangan_id = $request->ruangan_id;
        $mulai = $request->mulai;
        $selesai = $request->selesai;
        $keterangan = $request->keterangan;

        // Cek apakah kendaraan sudah dibooking untuk waktu yang dipilih
        $peminjamanExist = PeminjamanRuangan::where('ruangan_id', $ruangan_id)
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
            return redirect()->back()->with('error', 'Ruangan sudah dibooking untuk waktu tersebut.');
        }

        $peminjaman->update([
            'ruangan_id' => $ruangan_id,
            'mulai' => $mulai,
            'selesai' => $selesai,
            'keterangan' => $keterangan,
        ]);

        return redirect()->route('peminjaman-ruanganop.index')->with('success', 'Ruangan berhasil dipinjam.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $peminjaman = PeminjamanRuangan::where('uuid', $uuid)->firstOrFail();
        $peminjaman->delete();

        return redirect()->route('peminjaman-ruanganop.index')->with('success', 'Peminjaman Ruangan berhasil dihapus.');
    }
}
