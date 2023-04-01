<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = "tbl_alumni";
    protected $fillable = [
		'id_siswa',
    	'nama_lengkap',
    	'tahun',
    	'no_ijazah',
    	'ijazah'
    ];
}
