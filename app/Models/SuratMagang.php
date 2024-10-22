<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMagang extends Model
{
    use HasFactory;
    protected $table = 'suratmagang';
    protected $fillable = ['uuid', 'nama_kampus', 'file_surat'];

}
