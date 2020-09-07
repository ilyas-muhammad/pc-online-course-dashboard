<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Absen;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class AbsenExport implements FromQuery
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(string $kelas)
    {
        $this->kelas = $kelas;
    }

    public function query()
    {
        $absen = Absen::query();

        if ($this->kelas !== 'nofilter') {
            $absen = Absen::query()->where('kelas', 'like', "%".$this->kelas."%");
        }

        return $absen;
    }
}