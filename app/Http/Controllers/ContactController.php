<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function processContactForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
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
