<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use Illuminate\Support\Facades\DB; //untuk searching data 

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();

        return view('jadwal', ['jadwal' => $jadwal]);
    }
}