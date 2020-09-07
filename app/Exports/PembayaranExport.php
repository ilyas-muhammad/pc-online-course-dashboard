<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Galery;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PembayaranExport implements FromQuery

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
        $gambar = Galery::query();

        if ($this->kelas !== 'nofilter') {
            $gambar = Galery::query()->where('kelas', 'like', "%".$this->kelas."%");
        }

        return $gambar;
    }
}