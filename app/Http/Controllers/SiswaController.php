<?php

namespace App\Http\Controllers;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        $usersId = Auth::id();
        $users = Auth::user();


    //mengambil data dari tabel  siswa
    $siswa = DB::table('siswa')->where('id_users', $usersId)->get();

    if ($users->level == 1) { //admin
        $siswa = DB::table('siswa')->get(); // get semua data
    }
    //mengirim data siswa ke view siswa
    return view ('siswa', ['siswa' => $siswa, 'users' => $users]);
    }

    public function laporan()
    {
    //mengambil data dari tabel  siswa
    $siswa = DB::table('siswa')->get();

    //mengirim data siswa ke view siswa
    return view('adminlte.laporan.laporan-siswa', ['siswa' => $siswa]);

    }

    public function report(Request $request)
    {
        $kelas = $request->kelas;

        //mengambil data dari tabel  siswa
        $siswa = DB::table('siswa')
        ->where('kelas','like',"%" .$kelas."%")
        ->get();

        //mengirim data siswa ke view siswa
        return view('adminlte.laporan.laporan-siswa', ['siswa' => $siswa, 'kelas' => $kelas]);
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

        $siswa = DB::table('siswa')->get();
        //memanggil view tambah
        return view ('tambah-siswa', ['siswa' => $siswa]);
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
    
    public function printPDF($kelas)
    {
        $siswa = DB::table('siswa')->get();
        
        if ($kelas !== 'nofilter') {
            $siswa = DB::table('siswa')->where('kelas', 'like', "%".$kelas."%")->get();
        }
        
        $pdf = PDF::loadview('siswa-pdf', ['siswa' => $siswa]);
        return $pdf->download('data-siswa-pdf');

    }

    public function printExcel($kelas)
    {
        return Excel::download(new SiswaExport($kelas), 'data-siswa.xls');
    }
}
