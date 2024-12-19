<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function index ()
    {
        $feedback = Feedback::all();
        return view('feedback.index', compact('feedback'));
    }
    public function store(Request $request)
    {
        // Log data request untuk debugging
    Log::info('Data diterima:', $request->all());

    $validatedData = $request->validate([
        'kepuasan' => 'required|integer|min:1|max:5',
        'kecepatan' => 'required|integer|min:1|max:5',
        'kerapihan' => 'required|integer|min:1|max:5',
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
    ]);

    // Simpan ke database
    $feedback = Feedback::create($validatedData);

    // Log hasil penyimpanan
    Log::info('Data berhasil disimpan:', $feedback->toArray());

        return response()->json(['message' => 'Penilaian berhasil disimpan!'], 200);
    }

}

