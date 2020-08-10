<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;


class HariController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();

        return view('hari-jadwal', ['jadwal' => $jadwal]);
    }
}
