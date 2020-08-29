<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    protected $tabel = "evaluasi";

    protected $fillable = ['name', 'kelas', 'nama_evaluasi', 'skor', 'id_user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

