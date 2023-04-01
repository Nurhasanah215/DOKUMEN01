<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "tbl_siswa";
    protected $fillable = [
    	'id_alumni',
        'nisn',
    	'nama_lengkap',
        'alamat',
    	'jk',
    	'no_hp',
    	'skl_siswa',
    	'pip_siswa',
		'kk',
    	'gambar'
    ];
}
