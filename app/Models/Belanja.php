<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Belanja extends Model
{
    use HasFactory;
    public $incrementing = false; // Non-auto increment karena kita pakai string untuk ID

    protected $primaryKey = 'id'; // Primary key kolom 'id'
    
    protected $keyType = 'string'; // Tipe data string untuk ID

    protected $fillable = [
        'id', 'uuid','kegiatan_id', 'nama_belanja', 'alokasi_dana'
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
     public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'id');
    }
    public function detail_belanja()
    {
        return $this->hasMany(DetailBelanja::class, 'belanja_id', 'id');
    }
}
