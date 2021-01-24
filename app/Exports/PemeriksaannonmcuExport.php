<?php

namespace App\Exports;
use App\Models\Pemeriksaannonmcu;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemeriksaannonmcuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemeriksaannonmcu::all();
    }
}
