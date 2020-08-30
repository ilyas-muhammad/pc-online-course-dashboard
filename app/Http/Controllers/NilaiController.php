<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use PDF;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function index()
    {
    //mengambil data dari tabel  siswa
    $nilai = DB::table('nilai')->get();

    //mengirim data siswa ke view siswa
    return view ('nilai', ['nilai' => $nilai]);
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

    //mengambil data dari tabel  siswa
    $nilai = DB::table('nilai')
    ->where('kelas','like',"%" .$kelas."%")
    ->get();

    //mengirim data siswa ke view siswa
    return view('adminlte.laporan.laporan-nilai', ['nilai' => $nilai, 'kelas' => $kelas]);
}


public function cari (Request $request)
{
    $cari = $request->cari;

    $nilai = DB::table('nilai')
    ->where('name','like',"%" .$cari."%")
    ->paginate();

    return view('nilai',['nilai' => $nilai]);
}

public function tambah()
    {
        //memanggil view tambah
        return view ('tambah-nilai');
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

        //insert data ke table bank
        DB::table('nilai')->insert([
            'name' => $request->name,
            'tgl_evaluasi' => $request->tgl_evaluasi,
            'kelas' => $request->kelas,
            'jenkel' => $request->jenkel,
            'skor' => $request->skor,
        ]);
        //alihkan halaman ke halaman bank
        return redirect ('/nilai');
    
    
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

    public function printPDF($kelas)
    {
        $nilai = DB::table('nilai')->get();

        if ($kelas) {
            $nilai = DB::table('nilai')->where('nilai', 'like', "%".$kelas."%")->get();
        }

        $pdf = PDF::loadview('nilai-pdf', ['nilai' => $nilai]);
        return $pdf->download('data-nilai-pdf');

    }

    public function printExcel($kelas)
    {
        $nilai = DB::table('nilai')->get();
        
        if ($kelas) {
            $nilai = DB::table('nilai')->where('kelas', 'like', "%".$kelas."%")->get();
        }

        return Excel::download($nilai, 'data-nilai.xls');
    }
}

