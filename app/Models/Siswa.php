<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    // public $timestamps = false;
    protected $fillable = ['nim','nama','kelas','semester','sekolah','tgl_mulai_pkl','tgl_selesai_pkl','foto'];

}
