<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "tbl_kelas";
    protected $fillable = [
    	'id_guru',
    	'nama_lengkap',
    	'nama_kelas'
    ];
}
