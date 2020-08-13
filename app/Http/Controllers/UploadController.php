<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galery;

class UploadController extends Controller
{
    public function upload(){
        $gambar = Galery::get();
        return view ('upload', ['gambar' => $gambar]);
    }
      
    public function process_upload(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'jml_transfer' => 'required',
            'tgl_pembayaran' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png|max:2048',
            'keterangan' => 'required',
        ]);
        $file = $request ->file('file');
        $name = time ()."_".$file->getClientOriginalName();

        $path ='images';
        $file->move($path,$name);

        Galery::create([
            'name' => $name,
            'nama_bank' => $nama_bank,
            'no_rekening' => $no_rekening,
            'jml_transfer' => $jml_transfer,
            'tgl_pembayaran' => $tgl_pembayaran,
            'file' => $file,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->back();
    }
    
}
