<?php

namespace App\Http\Controllers;

use App\Models\Bbm;
use App\Models\Pegawai;
use App\Models\Kendaraan;
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
            $totalNominal = Bbm::where('nopol', $bbm->nopol) // gunakan ID kendaraan
                ->where('status', 'Disetujui Pimpinan')
                ->sum('nominal');

            // Ambil kendaraan berdasarkan ID
            $kendaraan = Kendaraan::find($bbm->nopol); // Menggunakan ID

            if ($kendaraan) {
                // Cek apakah total nominal sudah melebihi limit
                if ($kendaraan->bbm_limit && $totalNominal >= $kendaraan->bbm_limit) {
                    Log::info("Mengirim notifikasi untuk kendaraan: " . $kendaraan->nopol);
                    $this->sendWhatsappNotification($kendaraan);
                    // $this->sendEmailNotification($kendaraan, $totalNominal);
                } else {
                    Log::info("Kendaraan " . $kendaraan->nopol . " belum mencapai batas anggaran.");
                }
            } else {
                Log::warning("Kendaraan dengan ID " . $bbm->nopol . " tidak ditemukan.");
            }

            return redirect()->route('bbm.pengajuan2')->with('success', 'Permintaan BBM disetujui oleh Pimpinan.');
        }

        return redirect()->back()->with('error', 'Permintaan belum disetujui oleh Kasie.');
    }



    public function sendWhatsappNotification($kendaraan)
    {
        try {
            $sid = env('TWILIO_SID');
            $token = env('TWILIO_AUTH_TOKEN');
            $twilio = new Client($sid, $token);
            
            $message = "Kendaraan dengan nomor polisi " . $kendaraan->nopol . " telah mencapai batas maksimal anggaran BBM.";
            
            $twilio->messages->create(
                'whatsapp:+6288706608471', // Nomor tujuan (format: whatsapp:+62...)
                [
                    'from' => 'whatsapp:' .  env('TWILIO_PHONE_NUMBER'),
                    'body' => $message
                ]
            );
            Log::info("Notifikasi WhatsApp dikirim untuk kendaraan: " . $kendaraan->nopol);
        } catch (\Exception $e) {
            Log::error("Gagal mengirim pesan WhatsApp: " . $e->getMessage());
        }
    }

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
