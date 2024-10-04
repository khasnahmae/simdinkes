<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Atk extends Model
{
    use HasFactory;
    protected $table = 'atk';

    protected $fillable = [
        'tanggal',
        'pegawai_id',
        'jumlah_barang',
        'barang_id',
        'status',
        'uuid',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
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
