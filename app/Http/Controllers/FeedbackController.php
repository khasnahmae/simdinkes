<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;


class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::all();
        return view('feedback.index', compact('feedback'));
    }
    public function store(Request $request)
    {
        // Log data request untuk debugging
        Log::info('Data diterima:', $request->all());

        // Gunakan Validator manual agar bisa mengatur respons JSON saat validasi gagal
        $validator = Validator::make($request->all(), [
            'kepuasan' => 'required|integer|min:1|max:5',
            'kecepatan' => 'required|integer|min:1|max:5',
            'kerapihan' => 'required|integer|min:1|max:5',
            'deskripsi' => 'required|min:35',
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:13',
        ], [
            'kepuasan.required' => 'Anda wajib menilai Kualitas Pelayanan',
            'kecepatan.required' => 'Anda wajib menilai Kecepatan Pelayanan',
            'kerapihan.required' => 'Anda wajib menilai Kerapihan Petugas',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'deskripsi.min' => 'Deskripsi minimal 35 karakter',
            'nama.required' => 'Nama wajib diisi',
            'telepon.required' => 'No Telepon wajib diisi',
        ]);

        // Jika validasi gagal, kirim JSON dengan pesan error
        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'message' => 'Validasi gagal!',
                'errors' => $validator->errors()
            ], 422));
        }

        // Simpan ke database
        $feedback = Feedback::create($validator->validated());

        // Log hasil penyimpanan
        Log::info('Data berhasil disimpan:', $feedback->toArray());

        return response()->json(['message' => 'Penilaian berhasil disimpan!'], 200);
    }
}
