<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bbm extends Model
{
    use HasFactory;
    protected $table = 'bbm';

    protected $fillable = [
        'tanggal',
        'pegawai_id',
        'nopol',
        'nama_kendaraan',
        'jenis_bbm',
        'nominal',
        'status',
        'uuid',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'nopol');
         // Kolom 'nopol' di tabel t_bbm merujuk ke kolom 'nopol' di tabel t_kendaraan
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
    // Memastikan UUID otomatis terisi saat membuat model baru
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid(); // Generate UUID
            }
        });
    }

    // Pastikan UUID menjadi primary key yang dipakai untuk routing
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
