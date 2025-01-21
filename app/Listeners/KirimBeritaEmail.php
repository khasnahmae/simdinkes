<?php

namespace App\Listeners;

use App\Events\BeritaDibuat;
use App\Models\Langganan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class KirimBeritaEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BeritaDibuat $event): void
    {
        $langganan = Langganan::all();

        foreach ($langganan as $lgn) {
            Mail::send([], [], function ($message) use ($lgn, $event) {
                $message->to($lgn->email)
                    ->subject('Berita Baru: ' . $event->berita->judul)
                    ->html('<p>' . $event->berita->isi . '</p>'); // Gunakan html() sebagai pengganti setBody
            });
        }
    }
}
