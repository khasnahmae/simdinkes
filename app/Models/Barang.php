<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'stok',
    ];

    public function atk()
    {
        return $this->hasMany(Atk::class);
    }
    public function setNamaBarangAttribute($value)
    {
        $this->attributes['nama_barang'] = ucwords(strtolower($value)); // Ubah huruf pertama menjadi kapital
    }
}
