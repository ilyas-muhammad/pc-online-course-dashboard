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

    public function __construct(string $kelas, string $tanggal)
    {
        $this->kelas = $kelas;
        $this->tanggal = $tanggal;
    }

    public function query()
    {
        $nilai = Nilai::query();

        if ($this->kelas !== 'nofilter') {
            $nilai = Nilai::query()->where('kelas', 'like', "%".$this->kelas."%");
        } else if ($this->tanggal !== 'nodate') {
            $nilai = Nilai::query()->where('tgl_evaluasi', $this->tanggal);
        } else if ($this->kelas !== 'nofilter' && $this->tanggal !== 'nodate') {
            $nilai = Nilai::query()
                ->where('tgl_evaluasi', $this->tanggal)
                ->where('kelas', $this->kelas);
        }

        return $nilai;
    }
}
