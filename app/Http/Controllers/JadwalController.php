<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk searching data 

class JadwalController extends Controller
{
    public function index()
    {
    //mengambil data dari tabel  jadwal
    $jadwal = DB::table('siswa')->get();

    //mengirim data jadwal ke view jadwal
    return view ('jadwl', ['jadwal' => $jadwal]);

    }
}