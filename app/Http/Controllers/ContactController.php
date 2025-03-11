<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function processContactForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|min:4|max:255',
            'message' => 'required|string|min:10',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal harus 2 karakter.',
            'email.required' => ' No email, no message.',
            'email.email' => 'Format email tidak valid.',
            'subject.required' => 'Subjek wajib diisi.',
            'subject.min' => 'Subjek minimal harus 4 karakter.',
            'message.required' => 'Tulis sesuatu yang ingin Anda disampaikan',
            'message.min' => 'Isi pesan minimal 10 karakter.',
        ]);


        $to = "khasnahm@gmail.com";
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ];

        // Kirim email
        Mail::send([], [], function ($message) use ($data, $to) {
            $message->to($to)
                ->from($data['email'], $data['name'])
                ->subject($data['subject'])
                ->html($data['message']); // Gunakan html() untuk mengirim pesan dalam format HTML
        });


        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
