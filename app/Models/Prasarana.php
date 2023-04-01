<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prasarana extends Model
{
    protected $table = "tbl_prasarana";
    protected $fillable = [
    	'id_guru',
    	'nama_prasarana',
    	'sk_prasarana',
    	'gambar'
    ];
}
