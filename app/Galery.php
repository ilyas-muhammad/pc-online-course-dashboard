<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table = 'galeries';

    protected $fillable = ['name', 'nama_bank', 'no_rekening', 'tgl_pembayaran', 'file', 'keterangan'];
}
