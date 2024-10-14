<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PeminjamanKendaraan extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_kendaraan';
    protected $fillable = ['uuid','kendaraan_id','pegawai_id','mulai','selesai','keterangan','status'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString(); // Generate UUID
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid'; // Override agar mencari berdasarkan UUID
    }
}
