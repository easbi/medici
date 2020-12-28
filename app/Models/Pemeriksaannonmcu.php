<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaannonmcu extends Model
{
    use HasFactory;
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
