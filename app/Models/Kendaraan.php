<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraan';

    protected $fillable = [
        'nopol',
        'nama_kendaraan',
        'jenis',
        'tahun',
        'warna',
        'no_rangka',
        'no_mesin',
    ];

    public function bbm()
    {
        return $this->hasMany(Bbm::class);
    }
    public function setNamaKendaraanAttribute($value)
    {
        $this->attributes['nama_kendaraan'] = ucwords(strtolower($value)); // Ubah huruf pertama menjadi kapital
    }
    public function setJenisAttribute($value)
    {
        $this->attributes['jenis'] = ucwords(strtolower($value)); // Ubah huruf pertama menjadi kapital
    }
    public function setWarnaAttribute($value)
    {
        $this->attributes['warna'] = ucwords(strtolower($value)); // Ubah huruf pertama menjadi kapital
    }
}
