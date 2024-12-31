<?php

namespace App\Exports;

use App\Models\SalesVisit;
use App\Models\Visit;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalesVisitExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Visit::all();
    }
}
