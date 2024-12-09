<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    // BeritaController.php
    public function show($id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            abort(404, 'Berita tidak ditemukan');
        }

        return view('berita-show', compact('berita'));
    }

}
