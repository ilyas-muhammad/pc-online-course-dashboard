<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk searching data 

class UserController extends Controller
{
    public function index()
    {
    //mengambil data dari tabel  user
    $user = DB::table('user')->get();

    //mengirim data jadwal ke view user
    return view ('user', ['user' => $user]);

    }
}
