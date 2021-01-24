<?php

namespace App\Imports;

use App\Models\Pemeriksaan;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;

class McuImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new Pemeriksaan([
           'pemeriksaan_ke' => $row[1],
           'id_user_diperiksa' => $row[2],  
           'umur' => $row[3],
           'tgl_pemeriksaan' => $row[4],
           'petugas' => $row[5],
           'tinggi_badan' => $row[6],   
           'berat_badan'=> $row[7], 
           'suhu' => $row[8],   
           'nadi' => $row[9],   
           'pernapasan'=> $row[10],  
           'saturasi' => $row[11],   
           'tensi_sistol'  => $row[12],  
           'tensi_diastol' => $row[13],  
           'asam_urat'  => $row[14], 
           'gula_puasa'  => $row[15],
           'gula_sewaktu'=> $row[16],    
           'kolestrol'   => $row[17],
           'rekomendasi'=> $row[18]
        ]);
    }
}