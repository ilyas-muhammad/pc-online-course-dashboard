<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{

    protected $table = 'hari_jadwal';
    
    protected $fillable = [
        'hari',
    ];

    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal');
    }

}
