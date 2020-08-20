<?php

namespace App\Http\Controllers;
use App\Jadwal;
use App\Siswa;
use App\Absen;
use DateTime;
use DateTimeZone;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        // ambil id dari user yg login
        $id = Auth::id();

        // get satu data siswa where id user yg login => object {}
        $siswa = Siswa::where('id_users', $id)->first();

        // get semua data jadwal where siswa->id_jadwal => array []
        $jadwal = Jadwal::where('id', $siswa->id_jadwal)->get();

        $allAbsen = array(); // []

        foreach ($jadwal as $j) { 
            // get data absen where id siswa dan id jadwal => object {}
            $absen = Absen::where(['id_siswa' => $siswa->id, 'id_jadwal' => $j->id])->first();

            if ($absen) {
                // bikin object kosong baru => {}
                $object = new \stdClass();
                $object->status = $absen->status; // => { status: HADIR }
                $object->waktu_absen = $absen->waktu_absen; // { status: HADIR, waktu_absen: 10-10-2020 00:00:00 }


                $allAbsen[] = $object;
                // [
                //     {
                //         status: 'HADIR',
                //         waktu_absen: '10-10-2020 00:00:00'
                //     }
                // ]
            }
        }

        return view('absen', ['siswa' => $siswa, 'jadwal' => $jadwal, 'absen' => $allAbsen]);
    }

    public function absen($id_siswa, $id_jadwal)
    {
        $now = new DateTime();
        $timezone = new DateTimeZone('Asia/Jakarta');
        $now->setTimezone($timezone);

        $absen = DB::table('absen')->insert([
            'id_siswa' => $id_siswa,
            'id_jadwal' => $id_jadwal,
            'status' => 'HADIR',
            'waktu_absen' => $now,
        ]);

        return redirect()->back();
    }
}