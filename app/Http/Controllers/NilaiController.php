<?php

namespace App\Http\Controllers;
use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        $userId = Auth::id();
        $user = Auth::user();
    
        $nilai = DB::table('nilai')->where('id_user', $userId)->get();
    
        if ($user->level == 1) { //admin
            $nilai = DB::table('nilai')->get(); // get semua data
        }


    //mengirim data siswa ke view siswa
    return view ('nilai', ['nilai' => $nilai, 'user' => $user]);
}

public function laporan()
{
//mengambil data dari tabel  siswa
$nilai = DB::table('nilai')->get();

//mengirim data siswa ke view siswa
return view('adminlte.laporan.laporan-nilai', ['nilai' => $nilai]);

}

public function report(Request $request)
{
    $kelas = $request->kelas;
    $tanggal = $request->tanggal;

  
    $query = Nilai::query();
    if ($kelas != 'nofilter') {
        $query->where('kelas', $kelas);
    }
    if ($tanggal) {
        $query->where('tgl_evaluasi', $tanggal);
    }

    $nilai = $query->get();
  
    // var_dump($nilai);die();
    //mengirim data siswa ke view siswa
    return view('adminlte.laporan.laporan-nilai', ['nilai' => $nilai, 'kelas' => $kelas,  'date' => $tanggal]);
}


public function cari (Request $request)
{
    $cari = $request->cari;

    $nilai = DB::table('nilai')
    ->where('name','like',"%" .$cari."%")
    ->paginate();

    return view('nilai',['nilai' => $nilai]);
}

public function tambah( Request $request)
    {

        $siswa = DB::table('siswa')->get();
        $kelas = [];
        foreach($siswa->groupBy('kelas') as $index=>$data){
            array_push($kelas, $index);
        }
        asort($kelas);
	$selectedKelas = null;
	if(!empty($request->all()) && !empty($request->kelas)){
		$selectedKelas = $request->kelas;
		$siswa = DB::table('siswa')->where('kelas', $request->kelas)->get();
    }
    
    return view ('tambah-nilai', ['siswa' => $siswa, 'kelas' => $kelas, 'selectedKelas' => $selectedKelas]);
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
            'tgl_evaluasi' => 'required',
            'kelas' => 'required',
            'jenkel' => 'required',
            'skor' => 'required',

        ], $pesan);

        $siswa = DB::table('siswa')->where('id_users', $request->name)->first();

        //insert data ke table bank
        DB::table('nilai')->insert([
            'name' => $siswa->name,
            'tgl_evaluasi' => $request->tgl_evaluasi,
            'kelas' => $request->kelas,
            'jenkel' => $request->jenkel,
            'skor' => $request->skor,
            'id_user' => $siswa->id_users,
        ]);

        $userId = Auth::id();
        $user = Auth::user();

        $nilai = DB::table('nilai')->where('id_user', $userId)->get();

        if ($user->level == 1) { //admin
            $nilai = DB::table('nilai')->get(); // get semua data
        }

        return view ('nilai', ['nilai' => $nilai, 'user' => $user]);
    }

   
    public function edit($id)
    {
        //mEnGambil data bank berdasarkan id yang dipilih
        $nilai= DB::table('nilai') -> where('id', $id)->get();
        //passing data bank yang didapat ke view <edit class="blade php">retur</edit>
        return view('edit-nilai', ['nilai'=> $nilai]);
    
    }
    public function update(Request $request)
    {
        //update data siswa
        DB::table('nilai')->where('id', $request->id)->update([
            'name' => $request->name,
            'tgl_evaluasi' => $request->tgl_evaluasi,
            'kelas' => $request->kelas,
            'jenkel' => $request->jenkel,
            'skor' => $request->skor
        ]);

        //alihkan ke halaman bank
        return redirect('/nilai');

    }

    public function hapus($id)
    {
    //menghapus data bank berdasarkan id yang dipilih
    DB::table('nilai')->where('id',$id)->delete();

    //alihkan halaman ke halaman sbank
    return redirect('/nilai');
}

    public function printPDF($kelas, $tanggal)
    {
        $nilai = Nilai::get();
        if ($kelas != 'nofilter') {
            $nilai = Nilai::where('kelas', $kelas)->get();
        }

        $pdf = PDF::loadview('nilai-pdf', ['nilai' => $nilai]);
        return $pdf->download('data-nilai-pdf');

    }

    public function printExcel($kelas, $tanggal)
    {
        return Excel::download(new NilaiExport($kelas, $tanggal), 'data-nilai.xls');
    }
}

