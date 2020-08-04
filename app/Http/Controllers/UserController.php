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
}
