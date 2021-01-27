<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nonmcu extends Model
{
    protected $table = 'nonmcu_pemeriksaan';
    public $primaryKey = 'id';
    protected $fillable = [
    	'id_user_diperiksa',
    	'tgl_pemeriksaan',
    	'id_petugas',
    	'id_jenis_pemeriksaan',
    	'nilai',
    	'rekomendasi'
    ];
}
