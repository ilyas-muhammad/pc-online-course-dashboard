<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = "absen";
    
    protected $fillable = [
        'id_siswa', 'id_jadwal', 'status', 'waktu_absen'
    ];

    public function siswa() {
        return $this->hasOne('App\Siswa');
    }

    public function jadwal() 
    {
        return $this->hasMany('App\Jadwal');
    }
}
