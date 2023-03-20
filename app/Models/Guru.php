<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = "tbl_guru";
    protected $fillable = [
    	'nuptk',
    	'nama_lengkap',
    	'jk',
    	'status_sertifikasi',
    	'tgl_sertifikasi',
    	'sk_guru',
		'ijazah',
    	'kk',
    	'ktp'
    ];
}
