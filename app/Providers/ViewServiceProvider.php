<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Atk;
use App\Models\Bbm;
use App\Models\Notification;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Setiap kali 'layouts.app' dipanggil, kirimkan variabel ini ke view
        View::composer('layouts.apps', function ($view) {
            $pendingAtkCount = Atk::where('status', 'Pengajuan')->count();
            $pendingBbmCount = Bbm::where('status', 'Pengajuan')->count();
            $pendingAtkCount2 = Atk::where('status', 'Disetujui Kasie')->count();
            $pendingBbmCount2 = Bbm::where('status', 'Disetujui Kasie')->count();

            $view->with('pendingAtkCount', $pendingAtkCount)
                ->with('pendingAtkCount2', $pendingAtkCount2)
                ->with('pendingBbmCount2', $pendingBbmCount2)
                 ->with('pendingBbmCount', $pendingBbmCount);


            $notifications = Notification::orderBy('created_at', 'desc')->get();
    
            $view->with('notifications', $notifications);
        });
    }
}
