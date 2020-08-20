<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{

    protected $table = "jadwal";

    protected $fillable = [
        'nama_kelas', 'hari', 'max_siswa',
    ];

    public function siswa()
    {
        return $this->hasMany('App\Siswa',  'id_jadwal', 'id');
    }

    public function absen()
    {
        return $this->belongsTo('App\Absen');
    }
}
