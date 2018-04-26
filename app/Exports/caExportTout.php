<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class caExportTout implements FromCollection, WithHeadings
{

    public function Collection()
    {

        return \App\Consultations::all();
    }
}
