<?php

namespace App\Http\Controllers;
use App\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $userId = Auth::id();
        $user = Auth::user();
        $absensi = DB::table('absensi')->where('id_user', $userId)->get();
        if ($user->level == 1) { //admin
            $absensi = DB::table('absensi')->get(); // get semua data
        }
        return view ('absensi', ['absensi' => $absensi, 'user' => $user]);
    }
    public function laporan()
    {
    //mengambil data dari tabel  siswa
    $absensi = DB::table('absensi')->get();
    
    //mengirim data siswa ke view siswa
    return view('adminlte.laporan.laporan-absensi', ['absensi' => $absensi]);
    
    }
    
    public function report(Request $request)
    {
        $kelas = $request->kelas;
        $tanggal = $request->tanggal;
    
      
        $query = Absensi::query();
        if ($kelas != 'nofilter') {
            $query->where('kelas', $kelas);
        }
        if ($tanggal) {
            $query->where('tgl_absen', $tanggal);
        }
    
        $absensi = $query->get();
      
        // var_dump($nilai);die();
        //mengirim data siswa ke view siswa
        return view('adminlte.laporan.laporan-absensi', ['absensi' => $absensi, 'kelas' => $kelas,  'date' => $tanggal]);
    }
    
public function cari (Request $request)
{
    $cari = $request->cari;

    $absensi = DB::table('absensi')
    ->where('name','like',"%" .$cari."%")
    ->paginate();

    return view('absensi',['absensi' => $absensi]);
}
public function tambah(Request $request)
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
	//dd($kelas);
        //memanggil view tambah
        return view ('tambah-absensi', ['siswa' => $siswa, 'kelas' => $kelas, 'selectedKelas' => $selectedKelas]);
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
            'tgl_absen' => 'required',
            'keterangan' => 'required',

        ], $pesan);

        $siswa = DB::table('siswa')->where('id_users', $request->name)->first();

      
        DB::table('absensi')->insert([
            'name' => $siswa->name,
            'kelas' => $request->kelas,
            'tgl_absen' => $request->tgl_absen,
            'keterangan' => $request->keterangan,
            'id_user' => $siswa->id_users,
        ]);
        

        $userId = Auth::id();
        $user = Auth::user();

        $absensi = DB::table('absensi')->where('id_user', $userId)->get();

        if ($user->level == 1) { //admin
            $absensi = DB::table('absensi')->get(); // get semua data
        }

        return view ('absensi', ['absensi' => $absensi, 'user' => $user]);
    }
    public function edit($id)
    {
        //mEnGambil data bank berdasarkan id yang dipilih
        $absensi= DB::table('absensi') -> where('id', $id)->get();
        //passing data bank yang didapat ke view <edit class="blade php">retur</edit>
        return view('edit-absensi', ['absensi'=> $absensi]);
    
    }
    public function update(Request $request)
    {
        //update data siswa
        DB::table('absensi')->where('id', $request->id)->update([
            'name' => $request->name,
            'kelas' => $request->kelas,
            'tgl_absen' => $request->tgl_absen,
            'keterangan' => $request->keterangan,
        ]);

        //alihkan ke halaman bank
        return redirect('/absensi');

    }

    public function hapus($id)
    {
    //menghapus data bank berdasarkan id yang dipilih
    DB::table('absensi')->where('id',$id)->delete();

    //alihkan halaman ke halaman sbank
    return redirect('/absensi');
}

public function printPDF($kelas, $tanggal)
    {
        $absensi = Absensi::get();
        if ($kelas != 'nofilter') {
            $absensi = Absensi::where('kelas', $kelas)->get();
        }

        $pdf = PDF::loadview('absensi-pdf', ['absensi' => $absensi]);
        return $pdf->download('data-absensi-pdf');

    }

    public function printExcel($kelas, $tanggal)
    {
        return Excel::download(new AbsensiExport($kelas, $tanggal), 'data-absensi.xls');
    }
}
