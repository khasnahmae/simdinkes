<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';

    protected $fillable = ['nama', 'nip', 'bidang']; 

    public function atk()
    {
        return $this->hasMany(Atk::class);
    }
    public function bbm()
    {
        return $this->hasMany(Bbm::class);
    }
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucwords(strtolower($value)); // Ubah huruf pertama menjadi kapital
    }
    public function setBidangAttribute($value)
    {
        $this->attributes['bidang'] = ucwords(strtolower($value)); // Ubah huruf pertama menjadi kapital
    }
}
