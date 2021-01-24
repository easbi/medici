<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;
    protected $table = 'mcu_pemeriksaan';
    public $primaryKey = 'id';
    protected $fillable = [
    	'id_user_diperiksa',
    	'tgl_pemeriksaan',
        'pemeriksaan_ke',
        'umur',
    	'petugas',
    	'tinggi_badan',
    	'berat_badan',
    	'suhu',
    	'nadi',
    	'pernapasan',
    	'saturasi',
    	'tensi_sistol',
        'tensi_diastol',
    	'asam_urat',
    	'gula_puasa',
    	'gula_sewaktu',
    	'kolestrol',
    	'rekomendasi'
    ];
}
