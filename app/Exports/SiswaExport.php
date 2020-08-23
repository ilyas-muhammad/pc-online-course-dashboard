<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('siswa')->get();
    }
}
