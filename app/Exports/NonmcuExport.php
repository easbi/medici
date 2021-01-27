<?php

namespace App\Exports;

use App\NonMcu;
use Maatwebsite\Excel\Concerns\FromCollection;

class NonmcuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NonMcu::all();
    }
}
