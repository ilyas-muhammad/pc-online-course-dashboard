<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{

    protected $table = "jadwal";

    public function siswa()
    {
        return $this->hasMany('App\Siswa',  'id_jadwal', 'id');
    }
}
