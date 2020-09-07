<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Nilai;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class NilaiExport implements FromQuery
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
        $nilai = Nilai::query();

        if ($this->kelas !== 'nofilter') {
            $nilai = Nilai::query()->where('kelas', 'like', "%".$this->kelas."%");
        }

        return $nilai;
    }
}
