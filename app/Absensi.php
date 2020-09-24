<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = "absensi";

    protected $fillable = ['name', 'kelas', 'tgl_absen', 'keterangan', 'id_user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
} 