<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Siswa;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class SiswaExport implements FromQuery
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
        $siswa = Siswa::query();

        if ($this->kelas !== 'nofilter') {
            $siswa = Siswa::query()->where('kelas', 'like', "%".$this->kelas."%");
        }

        return $siswa;
    }
}
