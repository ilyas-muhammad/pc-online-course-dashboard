<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }


    public function galery()
    {
        return $this->hasMany('App\Galery');
    }

    public function evaluasi()
    {
        return $this->hasMany('App\Evaluasi');
    }

    public function absensi()
    {
        return $this->hasMany('App\Absensi');
    }

    public function nilai()
    {
        return $this->hasMany('App\Nilai');
    }
}
