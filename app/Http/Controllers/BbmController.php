<?php

namespace App\Http\Controllers;

use App\Models\Bbm;
use App\Models\Pegawai;
use App\Models\Kendaraan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BbmController extends Controller
{
    // Menampilkan daftar BBM
    public function index()
    {
        $bbm = Bbm::with(['pegawai', 'kendaraan'])
        ->orderBy('created_at', 'desc') // Mengurutkan data berdasarkan tanggal pembuatan, yang terbaru di atas
        ->get();
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
    public function edit(string $uuid)
    {
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail();
        $pegawai = Pegawai::orderBy('nama', 'asc')->get();
        $kendaraan = Kendaraan::orderBy('nopol', 'asc')->get();
        return view('bbm.edit', compact('bbm', 'pegawai', 'kendaraan'));
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

        return redirect()->route('bbm.index')->with('success', 'Permintaan BBM berhasil diperbarui.');
    }

    // Menghapus data BBM
    public function destroy(string $uuid)
    {
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail(); // Temukan BBM berdasarkan UUID
        $bbm->delete();

        return redirect()->route('bbm.index')->with('success', 'Permintaan BBM berhasil dihapus.');
    }
    public function approveByKasie(string $uuid)
    {
        if (auth()->user()->level !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail(); // Temukan BBM berdasarkan UUID
        $bbm->status = 'Disetujui Kasie';
        $bbm->save();

        return redirect()->route('bbm.pengajuan')->with('success', 'Permintaan BBM disetujui');
    }
    

    public function approveByPimpinan(string $uuid)
    {
        if (auth()->user()->level !== 'pemimpin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $bbm = Bbm::where('uuid', $uuid)->firstOrFail(); // Temukan BBM berdasarkan UUID

        if ($bbm->status === 'Disetujui Kasie') {
            $bbm->status = 'Disetujui Pimpinan';
            $bbm->save();

            // Hitung total nominal untuk kendaraan ini yang disetujui oleh pimpinan
            $totalNominal = Bbm::where('nopol', $bbm->nopol)
                ->where('status', 'Disetujui Pimpinan')
                ->where('created_at', '>=', now()->subMonths(1)) // Data dalam 6 bulan terakhir
                ->sum('nominal');

            // Ambil kendaraan berdasarkan ID
            $kendaraan = Kendaraan::find($bbm->nopol);

            if ($kendaraan) {
                // Hitung sisa limit
                $sisaLimit = $kendaraan->bbm_limit - $totalNominal;

                // Buat pesan notifikasi
                $message = "Kendaraan dengan nopol {$kendaraan->nopol} telah meminta BBM sebesar Rp " . number_format($bbm->nominal, 2, ',', '.') . ". Sisa limit BBM untuk kendaraan tersebut sekarang adalah Rp " . number_format($sisaLimit, 2, ',', '.');

                // Simpan notifikasi ke database
                Notification::create([
                    'title' => 'Permintaan BBM Disetujui', // Judul notifikasi
                    'message' => $message,
                    'is_read' => false,
                ]);

                if ($sisaLimit > 0) {
                    // Jika sisa limit masih tersedia
                    session()->flash('success', "Kendaraan dengan nopol {$kendaraan->nopol} telah meminta BBM sebesar Rp " . number_format($bbm->nominal, 2, ',', '.') . ". Sisa limit BBM untuk kendaraan tersebut sekarang adalah Rp " . number_format($sisaLimit, 2, ',', '.'));
                } else {
                    // Jika sisa limit sudah habis atau melebihi limit
                    session()->flash('warning', "Kendaraan dengan nopol {$kendaraan->nopol} telah melebihi limit BBM. Sisa limit sekarang adalah Rp " . number_format($sisaLimit, 2, ',', '.') . ". Perhatikan penggunaan BBM lebih lanjut.");
                }
            } else {
                Log::warning("Kendaraan dengan ID {$bbm->nopol} tidak ditemukan.");
            }
        } else {
            return redirect()->back()->with('error', 'Permintaan belum disetujui oleh Kasie.');
        }
    
        return redirect()->back();
    }

    // public function sendWhatsappNotification($kendaraan)
    // {
    //     try {
    //         $sid = env('TWILIO_SID');
    //         $token = env('TWILIO_AUTH_TOKEN');
    //         $twilio = new Client($sid, $token);
            
    //         $message = "Kendaraan dengan nomor polisi " . $kendaraan->nopol . " telah mencapai batas maksimal anggaran BBM.";
            
    //         $twilio->messages->create(
    //             'whatsapp:+6288706608471', // Nomor tujuan (format: whatsapp:+62...)
    //             [
    //                 'from' => 'whatsapp:' .  env('TWILIO_PHONE_NUMBER'),
    //                 'body' => $message
    //             ]
    //         );
    //         Log::info("Notifikasi WhatsApp dikirim untuk kendaraan: " . $kendaraan->nopol);
    //     } catch (\Exception $e) {
    //         Log::error("Gagal mengirim pesan WhatsApp: " . $e->getMessage());
    //     }
    // }

    // public function sendEmailNotification($kendaraan, $totalNominal)
    // {
    //     try {
    //         $recipientEmail = 'khasnahm@gmail.com'; // Ganti dengan email tujuan
            
    //         $data = [
    //             'subject' => 'Peringatan Batas Anggaran BBM Tercapai',
    //             'kendaraan' => $kendaraan->nopol,
    //             'totalNominal' => $totalNominal,
    //         ];

    //         Mail::send([], [], function($message) use ($data, $recipientEmail) {
    //             $message->to($recipientEmail)
    //                 ->subject($data['subject'])
    //                 ->html(
    //                     "<p>Kendaraan dengan nomor polisi <strong>" . $data['kendaraan'] . "</strong> telah mencapai batas maksimal anggaran BBM sebesar: <strong>" . $data['totalNominal'] . "</strong></p>"
    //                 ); // Menggunakan metode html() untuk isi pesan HTML
    //         });

    //         Log::info("Notifikasi email dikirim untuk kendaraan: " . $kendaraan->nopol);
    //     } catch (\Exception $e) {
    //         Log::error("Gagal mengirim email: " . $e->getMessage());
    //     }
    // }


    public function pengajuan()
    {
        if (auth()->user()->level !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        // Ambil data BBM dengan status 'Pengajuan' saja
        $bbm = Bbm::where('status', 'Pengajuan')->get();
        return view('pengajuan.bbm', compact('bbm'));

    }
    public function pengajuanPimpinan()
    {
        if (auth()->user()->level !== 'pemimpin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        // Ambil data BBM dengan status 'Pengajuan' saja
        $bbm = Bbm::where('status', 'Disetujui Kasie')->get();
        return view('pengajuan.bbmpimpinan', compact('bbm'));

    }

    public function print(string $uuid)
    {
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail(); // Temukan BBM berdasarkan UUID

        $pdf = Pdf::loadView('bbm.print', compact('bbm'));

        return $pdf->download('permintaan_bbm_' . $bbm->id . '.pdf');
    }
    public function realisasi(string $uuid)
    {
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail(); // Temukan BBM berdasarkan UUID

        if ($bbm->status !== 'Disetujui Pimpinan') {
            return redirect()->back()->with('error', 'Realisasi hanya bisa dilakukan setelah disetujui pimpinan.');
        }
        return view('bbm.realisasi', compact('bbm'));
    
    }
    public function submitRealisasi(Request $request, string $uuid)
    {
        $request->validate([
            'nominal_realisasi' => 'required|numeric|min:0',
            'bukti_transaksi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $bbm = Bbm::where('uuid', $uuid)->firstOrFail();

        // Proses upload bukti transaksi
        if ($request->hasFile('bukti_transaksi')) {
            $buktiTransaksi = $request->file('bukti_transaksi')->store('bukti-transaksi', 'public');
            $bbm->bukti_transaksi = $buktiTransaksi;
        }

        $bbm->nominal_realisasi = $request->nominal_realisasi;
        $bbm->realisasi = 'Sudah Direalisasi';
        $bbm->save();

        // Hitung selisih
        $selisih = $bbm->nominal - $bbm->nominal_realisasi;

        $kendaraan = Kendaraan::find($bbm->nopol);
        
        // Update limit berdasarkan selisih
        if ($selisih > 0) {
            $kendaraan->bbm_limit += $selisih; // Jika lebih
        } else {
            $kendaraan->bbm_limit -= abs($selisih); // Jika kurang
        }

        $kendaraan->save();

        return redirect()->route('bbm.index')->with('success', 'Realisasi BBM berhasil dilakukan.');
    }
    public function reject(string $uuid)
    {
        if (auth()->user()->level !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail(); // Temukan BBM berdasarkan UUID

        // Update status menjadi 'ditolak'
        $bbm->status = 'Ditolak';
        $bbm->save();

        return redirect()->back()->with('success', 'Permintaan BBM telah ditolak.');
    }
    public function rejectByPimpinan(string $uuid)
    {
        $bbm = Bbm::where('uuid', $uuid)->firstOrFail(); // Temukan BBM berdasarkan UUID

        if (auth()->user()->level !== 'pemimpin') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        // Update status menjadi 'ditolak'
        $bbm->status = 'Ditolak oleh Pimpinan';
        $bbm->save();

        return redirect()->back()->with('success', 'Permintaan BBM telah ditolak.');
    }

}
