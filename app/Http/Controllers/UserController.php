<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk searching data 
use Illuminate\Support\Facades\Hash;

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
        ->where('name','like',"%".$cari."%")
        ->paginate();

        // mengirim data user ke view user
        return view ('users', ['users' => $users]);
    }
    public function tambah()
    {
        //memanggil view tambah
        return view ('tambah-users');
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
            'password' => 'required',
            'status' => 'required'
        ], $pesan);


        //insert data ke table siswa
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password' => Hash::make($request->password)
        ]);
        //alihkan halaman ke halaman siswa
        return redirect ('/users');
    
        
    }
    public function edit($id)
    {
        //mEnGambil data siswa berdasarkan id yang dipilih
        $users = DB::table('users') -> where('id', $id)->get();
        //passing data siswa yang didapat ke view <edit class="blade php">retur</edit>
        return view('edit-users', ['users'=> $users]);
    
    }
    public function update(Request $request)
    {
        //update data siswa
        DB::table('users')->where('id', $request->id)->update([
             'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password' => Hash::make($request->password)
        ]);
        //alihkan ke halaman siswa
        return redirect('/users');

    }

    public function hapus($id)
        {
        //menghapus data siswa berdasarkan id yang dipilih
        DB::table('users')->where('id',$id)->delete();

        //alihkan halaman ke halaman siswa
        return redirect('/users');
    }
    
}
