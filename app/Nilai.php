<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $tabel = 'nilai';
    protected $fillable = ['name', 'kelas', 'jenkel', 'skor'];
}

