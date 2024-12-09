<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatans';
    public $incrementing = false; // Non-auto increment karena kita pakai string untuk ID

    protected $primaryKey = 'id'; // Primary key kolom 'id'
    
    protected $keyType = 'string'; // Tipe data string untuk ID

    protected $fillable = [
        'id', 'uuid', 'nama_kegiatan', 'alokasi_dana'
    ];

    // Generate UUID ketika menyimpan model
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
    // Pastikan UUID menjadi primary key yang dipakai untuk routing
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    public function belanja()
    {
        return $this->hasMany(Belanja::class);
    }
}
