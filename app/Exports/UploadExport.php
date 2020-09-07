<?php

namespace App\Exports;

use App\Galery;
use Maatwebsite\Excel\Concerns\FromCollection;

class UploadExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Galery::all();
    }
}
