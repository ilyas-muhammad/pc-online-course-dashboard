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

    public function __construct(string $kelas, string $tanggal)
    {
        $this->kelas = $kelas;
        $this->tanggal = $tanggal;
    }

    public function query()
    {
        $gambar = Galery::query();

        if ($this->kelas !== 'nofilter') {
            $gambar = Galery::query()->where('kelas', 'like', "%".$this->kelas."%");
        } else if ($this->tanggal !== 'nodate') {
            $gambar = Galery::query()->where('tgl_pembayaran', $this->tanggal);
        } else if ($this->kelas !== 'nofilter' && $this->tanggal !== 'nodate') {
            $gambar = Galery::query()
                ->where('tgl_pembayaran', $this->tanggal)
                ->where('kelas', $this->kelas);
        }

        return $gambar;
    }
}