<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Absensi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class AbsensiExport implements FromQuery
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
        $absensi = Absensi::query();

        if ($this->kelas !== 'nofilter') {
            $absensi = Absensi::query()->where('kelas', 'like', "%".$this->kelas."%");
        } else if ($this->tanggal !== 'nodate') {
            $absensi = Absensi::query()->where('tgl_evaluasi', $this->tanggal);
        } else if ($this->kelas !== 'nofilter' && $this->tanggal !== 'nodate') {
            $absensi = Absensi::query()
                ->where('tgl_evaluasi', $this->tanggal)
                ->where('kelas', $this->kelas);
        }

        return $absensi;
    }
}