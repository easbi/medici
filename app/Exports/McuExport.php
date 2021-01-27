<?php

namespace App\Exports;

use App\Mcu;
use Maatwebsite\Excel\Concerns\FromCollection;

class McuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mcu::all();
    }
}
