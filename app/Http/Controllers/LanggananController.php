<?php

namespace App\Http\Controllers;

use App\Models\Langganan;
use Illuminate\Http\Request;

class LanggananController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|unique:langganans,email',
            ]);

            Langganan::create([
                'email' => $validated['email'],
            ]);

            return redirect()->back()->with('success', 'Email berhasil terdaftar! Anda akan menerima notifikasi untuk setiap berita terbaru.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'Email sudah terdaftar! Silakan gunakan email lain.');
        }
    }
}
