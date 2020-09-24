<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;

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
    

    public function laporan()
    {
        //mengambil data dari tabel  siswa
        $gambar = DB::table('galeries')->get();

        //mengirim data siswa ke view siswa
        return view('adminlte.laporan.laporan-pembayaran', ['gambar' => $gambar]);
    }

public function report(Request $request)
{
    $kelas = $request->kelas;
    $tanggal = $request->tanggal;

    //mengambil data dari tabel  siswa
    $query = Galery::query();
    if ($kelas != 'nofilter') {
        $query->where('kelas', $kelas);
    }

    if ($tanggal) {
        $query->where('tgl_pembayaran', $tanggal);
    }
    
    $gambar = $query->get();

    //mengirim data siswa ke view siswa
    return view('adminlte.laporan.laporan-pembayaran', ['gambar' => $gambar, 'kelas' => $kelas, 'date' => $tanggal]);
}


public function cari (Request $request)
{
    $cari = $request->cari;

    $gambar = DB::table('galeries')
    ->where('name','like',"%" .$cari."%")
    ->paginate();

    return view('upload',['gambar' => $gambar]);
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
            'kelas' => 'required',
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
            'kelas' => $request->kelas,
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
    public function printPDF($kelas, $tanggal)
    {
        //mengambil data dari tabel  siswa
        $gambar = Galery::query();
        if ($kelas != 'nofilter') {
            $gambar->where('kelas', $kelas);
        }
    
        if ($tanggal != 'nodate') {
            $gambar->where('tgl_pembayaran', $tanggal);
        }

        $gambar = $gambar->get();
        
        $pdf = PDF::loadview('upload-pdf', ['gambar' => $gambar]);
        // var_dump($pdf); die();
        return $pdf->download('data-pembayaran-pdf');

    }

    public function printExcel($kelas, $tanggal)
    {
        return Excel::download(new PembayaranExport($kelas, $tanggal), 'data-nilai.xls');
    }
}
