<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atk extends Model
{
    use HasFactory;
    protected $table = 'atk';

    protected $fillable = [
        'tanggal',
        'pegawai_id',
        'jumlah_barang',
        'barang_id',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
