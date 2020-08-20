<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $table = "siswa";
    
    protected $fillable = [
        'name', 'email', 'kelas', 'jenkel', 'status'
    ];

    public function user()
    {
        return $this->hasOne('App\user');
    }

    public function jadwal()
    {
        return $this->belongsTo('App\Siswa');
    }

    public function absen()
    {
        return $this->belongsTo('App\Absen');
    }
}
