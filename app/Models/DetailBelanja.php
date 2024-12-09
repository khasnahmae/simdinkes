<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DetailBelanja extends Model
{
    use HasFactory;

    protected $table = 'detail_belanjas';

    protected $fillable = [
        'uuid',
        'belanja_id',
        'nama_kegiatan',
        'qty',
        'satuan',
        'harga',
        'jumlah'
    ];

    // Set UUID saat membuat instance baru
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }
    // Pastikan UUID menjadi primary key yang dipakai untuk routing
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    // Relasi dengan model Belanja
    public function belanja()
    {
        return $this->belongsTo(Belanja::class, 'belanja_id', 'id');
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'detail_belanja_id', 'id');
    }
}
