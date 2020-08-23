<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class EvaluasiController extends Controller
{
    
    public function index()
    {
    //mengambil data dari tabel  evaluasi
    $evaluasi = DB::table('evaluasi')->get();

    //mengirim data siswa ke view siswa
    return view ('evaluasi', ['evaluasi' => $evaluasi]);
}
public function cari (Request $request)
{
    $cari = $request->cari;

    $evaluasi = DB::table('evaluasi')
    ->where('name','like',"%" .$cari."%")
    ->paginate();

    return view('evaluasi',['evaluasi' => $evaluasi]);
}
}