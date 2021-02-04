<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mcu extends Model
{
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
    	'rekomendasi',
        'status_tensi',
        'status_asam_urat',
        'status_kolestrol'
    ];
}

