<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk searching data 

class SiswaController extends Controller
{
    public function index()
    {
    //mengambil data dari tabel  siswa
    $siswa = DB::table('siswa')->get();

    //mengirim data siswa ke view siswa
    return view ('siswa', ['siswa' => $siswa]);

    }

    public function cari (Request $request)
    {
        $cari = $request->cari;

        $siswa = DB::table('siswa')
        ->where('name','like',"%" .$cari."%")
        ->paginate();

        return view('siswa',['siswa' => $siswa]);
    }

    public function tambah()
    {
        //memanggil view tambah
        return view ('tambah-siswa');
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
            'email' => 'required',
            'kelas' => 'required',
            'jenkel' => 'required',
            'status' => 'required'
        ], $pesan);


        //insert data ke table siswa
        DB::table('siswa')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'jenkel' => $request->jenkel,
            'status' => $request->status
        ]);
        //alihkan halaman ke halaman siswa
        return redirect ('/siswa');
    
        

    }
    public function edit($id)
    {
        //mEnGambil data siswa berdasarkan id yang dipilih
        $siswa = DB::table('siswa') -> where('id', $id)->get();
        //passing data siswa yang didapat ke view <edit class="blade php">retur</edit>
        return view('edit-siswa', ['siswa'=> $siswa]);
    
    }
    public function update(Request $request)
    {
        //update data siswa
        DB::table('siswa')->where('id', $request->id)->update([
             'name' => $request->name,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'jenkel' => $request->jenkel,
            'status' => $request->status,
        ]);
        //alihkan ke halaman siswa
        return redirect('/siswa');

    }

    public function hapus($id)
        {
        //menghapus data siswa berdasarkan id yang dipilih
        DB::table('siswa')->where('id',$id)->delete();

        //alihkan halaman ke halaman siswa
        return redirect('/siswa');
    }
}
