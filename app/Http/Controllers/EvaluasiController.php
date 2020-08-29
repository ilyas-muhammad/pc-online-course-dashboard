<?php

namespace App\Http\Controllers;
use App\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;

class EvaluasiController extends Controller
{
   
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $userId = Auth::id();
        $user = Auth::user();

        $evaluasi = DB::table('evaluasi')->where('id_user', $userId)->get();

        if ($user->level == 1) { //admin
            $evaluasi = DB::table('evaluasi')->get(); // get semua data
        }

        return view ('evaluasi', ['evaluasi' => $evaluasi, 'user' => $user]);
    }

public function cari (Request $request)
{
    $cari = $request->cari;

    $evaluasi = DB::table('evaluasi')
    ->where('name','like',"%" .$cari."%")
    ->paginate();

    return view('evaluasi',['evaluasi' => $evaluasi]);
}
public function tambah()
    {
        $siswa = DB::table('siswa')->get();
        //memanggil view tambah
        return view ('tambah-evaluasi', ['siswa' => $siswa]);
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
            'kelas' => 'required',
            'nama_evaluasi' => 'required',
            'skor' => 'required',

        ], $pesan);

        $siswa = DB::table('siswa')->where('id_users', $request->name)->first();

        //insert data ke table bank
        DB::table('evaluasi')->insert([
            'name' => $siswa->name,
            'kelas' => $request->kelas,
            'nama_evaluasi' => $request->nama_evaluasi,
            'skor' => $request->skor,
            'id_user' => $siswa->id_users,
        ]);
        

        $userId = Auth::id();
        $user = Auth::user();

        $evaluasi = DB::table('evaluasi')->where('id_user', $userId)->get();

        if ($user->level == 1) { //admin
            $evaluasi = DB::table('evaluasi')->get(); // get semua data
        }

        return view ('evaluasi', ['evaluasi' => $evaluasi, 'user' => $user]);
    }
    public function edit($id)
    {
        //mEnGambil data bank berdasarkan id yang dipilih
        $evaluasi= DB::table('evaluasi') -> where('id', $id)->get();
        //passing data bank yang didapat ke view <edit class="blade php">retur</edit>
        return view('edit-evaluasi', ['evaluasi'=> $evaluasi]);
    
    }
    public function update(Request $request)
    {
        //update data siswa
        DB::table('evaluasi')->where('id', $request->id)->update([
            'name' => $request->name,
            'kelas' => $request->kelas,
            'nama_evaluasi' => $request->nama_evaluasi,
            'skor' => $request->skor
        ]);

        //alihkan ke halaman bank
        return redirect('/evaluasi');

    }

    public function hapus($id)
    {
    //menghapus data bank berdasarkan id yang dipilih
    DB::table('evaluasi')->where('id',$id)->delete();

    //alihkan halaman ke halaman sbank
    return redirect('/evaluasi');
}

}