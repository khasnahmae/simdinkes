<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';

    protected $fillable = ['nama', 'user_id','nip', 'bidang','uuid']; 

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
    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
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
