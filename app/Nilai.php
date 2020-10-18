<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';

    protected $fillable = ['name', 'kelas', 'jenkel', 'skor'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

