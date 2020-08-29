<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function upload(){
        $userId = Auth::id();
        $user = Auth::user();

        $gambar = Galery::where('id_user', $userId)->get();

        if ($user->level == 1) { //admin
            $gambar = Galery::get(); // get semua data
        }

        return view ('upload', ['gambar' => $gambar, 'user' => $user]);
    }
      
   
    public function tambah()
    {
        //memanggil view tambah
        return view ('tambah-upload');
    }
    public function process_upload(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'jml_transfer' => 'required',
            'tgl_pembayaran' => 'required',
            // 'file' => 'required|image|mimes:jpeg,png|max:2048',
            'keterangan' => 'required',
        ]);
        $file = $request->file('file');
        $name = time()."_".$file->getClientOriginalName();

        $path ='images';
        $file->move($path,$name);

        $userId = Auth::id();

        Galery::create([
            'name' => $request->name,
            'id_user' => $userId,
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening,
            'jml_transfer' => $request->jml_transfer,
            'tgl_pembayaran' => $request->tgl_pembayaran,
            'file' => $name,
            'keterangan' => $request->keterangan,
        ]);

        $userId = Auth::id();
        $user = Auth::user();

        $gambar = Galery::where('id_user', $userId)->get();

        if ($user->level == 1) { //admin
            $gambar = Galery::get(); // get semua data
        }

        return view ('upload', ['gambar' => $gambar, 'user' => $user]);
    }

    public function approved($request)
    {
        //update data jadwal
        DB::table('galeries')->where('id', $request)->update([
          
            'status' => 'approved'
            
          
        ]);
        //alihkan ke halaman jadwal
        return redirect()->back();

    }
    
    
    public function decline($request)
    {
        //update data jadwal
        DB::table('galeries')->where('id', $request)->update([
          
            'status' => 'decline'
            
          
        ]);
        //alihkan ke halaman jadwal
        return redirect()->back();

    }
    
}
