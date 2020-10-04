<?php

namespace App\Http\Controllers;
use App\Jadwal;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB; 

class JadwalController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $userId = Auth::id();
        $user = Auth::user();

        $jadwal = Jadwal::where('id_user', $userId)->get();

        if ($user->level == 1) { //admin
            $jadwal = Jadwal::get (); // get semua data
        } else {
            $siswa = Siswa::where('id_users', $userId)->first();

            $jadwal = Jadwal::where('id', $siswa->id_jadwal)->first();
            $jadwal['siswa'] = array($siswa);
            $jadwal = array($jadwal);
        }

        return view ('jadwal', ['jadwal' => $jadwal, 'user' => $user]);
    }


    public function cari (Request $request)
    {
        $cari = $request->cari;

        $jadwal = DB::table('jadwal')
        ->where('name','like',"%" .$cari."%")
        ->paginate();

        return view('jadwal',['jadwal' => $jadwal]);
    }


    public function tambah()
    {
        //memanggil view tambah
        return view ('tambah-jadwal');
    }

    public function store(Request $request)
    {
        $pesan = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus diisi minimal :min 1',
            'max' => ':attribute harus diisi max :max 1',
        ];
        // validasi user data input
        $this->validate($request,[
           
            'nama_kelas' => 'required',
            'hari' => 'required',
            'max_siswa' => 'required',
            'waktu_mulai' => 'required',
            'waktu_akhir' => 'required',
        ], $pesan);


        //insert data ke table jadwal
        
        $jadwal = Jadwal::create([
            'nama_kelas' => $request['nama_kelas'],
            'hari' => $request['hari'],
            'max_siswa' => $request['max_siswa'],
            'waktu_mulai' => $request['waktu_mulai'],
            'waktu_akhir' => $request['waktu_akhir'],
        ]);

       
      
        //alihkan halaman ke halaman jadwal
        return redirect ('/jadwal');
    }

    public function edit($id)
    {
        //mEnGambil data jadwal berdasarkan id yang dipilih
        $jadwal = DB::table('jadwal') -> where('id', $id)->get();
        //passing data siswa yang didapat ke view <edit class="blade php">retur</edit>
        return view('edit-jadwal', ['jadwal'=> $jadwal]);
    
    }
    public function update(Request $request)
    {
        //update data jadwal
        DB::table('jadwal')->where('id', $request->id)->update([
          
            'nama_kelas' => $request->nama_kelas,
            'hari' => $request->hari,
            'max_siswa' => $request->max_siswa,
          
        ]);
        //alihkan ke halaman jadwal
        return redirect('/jadwal');

    }

    public function hapus($id)
        {
        //menghapus data jadwal berdasarkan id yang dipilih
        DB::table('jadwal')->where('id',$id)->delete();

        //alihkan halaman ke halaman siswa
        return redirect('/jadwal');
    }

}