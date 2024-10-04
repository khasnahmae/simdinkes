<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraan';

    protected $fillable = [
        'nopol',
        'nama_kendaraan',
        'jenis',
        'tipe',
        'tahun',
        'warna',
        'no_rangka',
        'no_mesin',
        'jenis_bbm',
        'uuid',
        'bbm_limit',
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
    public function setTipeAttribute($value)
    {
        $this->attributes['tipe'] = ucwords(strtolower($value)); // Ubah huruf pertama menjadi kapital
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
