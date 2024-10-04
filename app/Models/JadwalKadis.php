<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JadwalKadis extends Model
{
    use HasFactory;
    protected $table = 'jadwal_kadis';

    protected $fillable = [
        'tgl_mulai',
        'tgl_selesai',
        'keterangan',
        'lokasi',
        'uuid',
    ];
    public function setLokasiAttribute($value)
    {
        $this->attributes['lokasi'] = ucwords(strtolower($value)); // Ubah huruf pertama menjadi kapital
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
