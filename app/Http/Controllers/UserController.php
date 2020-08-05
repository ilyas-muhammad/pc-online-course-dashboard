<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk searching data 

class UserController extends Controller
{
    public function index()
    {
    //mengambil data dari tabel  user
    $users = DB::table('users')->get();

    //mengirim data user ke view user
    return view ('users', ['users' => $users]);

    }

    public function cari(Request $request)
    {
        //menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari tabel users sesuai pencarian data
        $users = DB::table('users')
        ->where('nama','like',"%".$cari."%")
        ->paginate();

        // mengirim data user ke view user
        return view ('users', ['users' => $users]);
    }
}
