<?php

namespace App\Http\Controllers;
use App\Jadwal;
use App\Siswa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; //untuk searching data 

class JadwalController extends Controller
{
    public function index()
    {
            //mengambil data dari tabel  jadwal
        $jadwal = Jadwal::all();


            //mengirim data jadwal siswa ke view jadwal
        return view('jadwal', ['jadwal' => $jadwal]);
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
            'name' => 'required',
            'nama_kelas' => 'required',
            'hari' => 'required',
            'max_siswa' => 'required',
        ], $pesan);


        //insert data ke table jadwal

      
        
        $jadwal = Jadwal::create([
            'nama_kelas' => $request['nama_kelas'],
            'hari' => $request['hari'],
            'max_siswa' => $request['max_siswa'],
            
        ]);

        $siswa = Siswa::create([
            'name' => $request['name'],
        
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
             'name' => $request->name,
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