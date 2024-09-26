<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKadis extends Model
{
    use HasFactory;
    protected $table = 'jadwal_kadis';

    protected $fillable = [
        'tgl_mulai',
        'tgl_selesai',
        'keterangan',
        'lokasi',
    ];
    public function setLokasiAttribute($value)
    {
        $this->attributes['lokasi'] = ucwords(strtolower($value)); // Ubah huruf pertama menjadi kapital
    }
}
