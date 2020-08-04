<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk searching data 

class SiswaController extends Controller
{
    public function index()
    {
    //mengambil data dari tabel  siswa
    $siswa = DB::table('siswa')->get();

    //mengirim data jadwal ke view siswa
    return view ('siswa', ['siswa' => $siswa]);

    }
}
