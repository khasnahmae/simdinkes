<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bbm extends Model
{
    use HasFactory;
    protected $table = 'bbm';

    protected $fillable = [
        'tanggal',
        'pegawai_id',
        'nopol',
        'nama_kendaraan',
        'nominal',
        'status',
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
}
