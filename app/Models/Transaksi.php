<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'detail_belanja_id', // Foreign key ke tabel detail_belanjas
        'nama_kegiatan',
        'qty',
        'satuan',
        'harga',
        'jumlah',
        'tanggal_transaksi',
        'nama_penyedia',
    ];

    // Gunakan UUID pada model ini
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Str::uuid(); // Tambahkan UUID saat create
            }
        });
    }

    // Relasi ke tabel detail belanja
    public function detail_belanja()
    {
        return $this->belongsTo(DetailBelanja::class);
    }
}
