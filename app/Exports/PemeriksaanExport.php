<?php

namespace App\Exports;
use App\Models\Pemeriksaan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemeriksaanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemeriksaan::all();
    }
}
