<?php

namespace App\Imports;

use App\Nonmcu;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;

class NonmcuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nonmcu([
            'id_user_diperiksa' => $row[2],
            'tgl_pemeriksaan' => $row[3],
            'id_petugas'=>$row[1],
            'id_jenis_pemeriksaan' => $row[4],
            'nilai' => $row[5],
            'rekomendasi'  => $row[6]
        ]);
    }
}
