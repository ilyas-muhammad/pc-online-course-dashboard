<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class BankController extends Controller
{
    
    public function index()
    {
    //mengambil data dari tabel  siswa
    $bank = DB::table('bank')->get();

    //mengirim data siswa ke view siswa
    return view ('bank', ['bank' => $bank]);
}


public function cari (Request $request)
{
    $cari = $request->cari;

    $bank = DB::table('bank')
    ->where('name','like',"%" .$cari."%")
    ->paginate();

    return view('bank',['bank' => $bank]);
}
public function tambah()
    {
        //memanggil view tambah
        return view ('tambah-bank');
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

            'nama_bank' => 'required',
            'nama_akun' => 'required',
            'no_rekening' => 'required',

        ], $pesan);


 //insert data ke table bank
        DB::table('bank')->insert([
            'nama_bank' => $request->nama_bank,
            'nama_akun' => $request->nama_akun,
            'no_rekening' => $request->no_rekening,
           
        ]);
        //alihkan halaman ke halaman bank
        return redirect ('/bank');
    
    
    }
    public function edit($id)
    {
        //mEnGambil data bank berdasarkan id yang dipilih
        $bank = DB::table('bank') -> where('id', $id)->get();
        //passing data bank yang didapat ke view <edit class="blade php">retur</edit>
        return view('edit-bank', ['bank'=> $bank]);
    
    }
    public function update(Request $request)
    {
        //update data siswa
        DB::table('bank')->where('id', $request->id)->update([
            'nama_bank' => $request->nama_bank,
            'nama_akun' => $request->nama_akun,
            'no_rekening' => $request->no_rekening,
        ]);
        //alihkan ke halaman bank
        return redirect('/bank');

    }

    public function hapus($id)
    {
    //menghapus data bank berdasarkan id yang dipilih
    DB::table('bank')->where('id',$id)->delete();

    //alihkan halaman ke halaman sbank
    return redirect('/bank');
}
}

