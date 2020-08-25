<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blank-page', function () {
    return view('adminlte.blank');
})->name('blank-page');

Route::get('/crud', function () {
    return view('adminlte.crud.index');
})->name('crud');

Route::get('/crud/create', function () {
    return view('adminlte.crud.create');
})->name('crud.create');

Route::get('/crud/edit', function () {
    return view('adminlte.crud.edit');
})->name('crud.edit');


//menjalankan controller jadwal
Route::get('/jadwal', 'JadwalController@index')->name('jadwal');
//search data jadwal
Route::get('/jadwal/cari','JadwalController@cari');
//tambah jadwal baru
Route::get('/jadwal/tambah', 'JadwalController@tambah');
Route::post('/jadwal/store', 'JadwalController@store');
//edit jadwal
Route::get('/jadwal/edit/{params}', 'JadwalController@edit');
Route::post('/jadwal/update', 'JadwalController@update');
Route::get('/jadwal/hapus/{params}', 'JadwalController@hapus');


//menjalankan controller siswa
Route::get('/siswa', 'SiswaController@index')->name('siswa');
//search data siswa
Route::get('/siswa/cari','SiswaController@cari');
//tambah siswa baru
Route::get('/siswa/tambah', 'SiswaController@tambah');
Route::post('/siswa/store', 'SiswaController@store');
//edit siswa
Route::get('/siswa/edit/{params}', 'SiswaController@edit');
Route::post('/siswa/update', 'SiswaController@update');
//hapus siswa
Route::get('/siswa/hapus/{params}', 'SiswaController@hapus');
//cetak data siswa
Route::get('/siswa/print-pdf', 'SiswaController@printPDF');
Route::get('/siswa/print-excel', 'SiswaController@printExcel');

//menjalankan controller user
Route::get('/users', 'UserController@index')->name('users');
//search data user
Route::get('/users/cari','UserController@cari');


//one to many hari ke jadwal
//Route::get('/hari-jadwal', 'HariController@index');


//upload file pembayaran
Route::get('/upload',  'UploadController@upload')->name('upload');
Route::get('/upload/tambah', 'UploadController@tambah');
Route::post('/upload/proses', 'UploadController@process_upload');



//menjalankan controller bank
Route::get('/bank', 'BankController@index')->name('bank');
//search data siswa
Route::get('/bank/cari','BankController@cari');
//tambah akun bank baru
Route::get('/bank/tambah', 'BankController@tambah');
Route::post('/bank/store', 'BankController@store');
//edit akun bank
Route::get('/bank/edit/{params}', 'BankController@edit');
Route::post('/bank/update', 'BankController@update');
//hapus akun bank
Route::get('/bank/hapus/{params}', 'BankController@hapus');

//aproved pembayaran
Route::get('/upload/approved/{params}',  'UploadController@approved');
Route::get('/upload/decline/{params}',  'UploadController@decline');

Route::get('/register1', 'RegisterController@createStep1')->name('signup');
Route::post('/register1', 'RegisterController@PostcreateStep1');
Route::get('/register2', 'RegisterController@createStep2');
Route::post('/register2', 'RegisterController@PostcreateStep2');
Route::get('/register3', 'RegisterController@createStep3');
Route::post('/register3', 'RegisterController@PostcreateStep3');
Route::post('/remove-image', 'RegisterController@removeImage');
Route::post('/store', 'RegisterController@store');
Route::get('/data', 'RegisterController@index');


//menjalankan controller absensi
Route::get('/absen', 'AbsenController@index')->name('absen');
Route::get('/present/{ids}/{idj}', 'AbsenController@absen');

//menjalankan controller evaluasi
Route::get('/evaluasi', 'EvaluasiController@index')->name('evaluasi');
//search data evaluasi
Route::get('/evaluasi/cari','EvaluasiController@cari');
//tambah 
Route::get('/evaluasi/tambah', 'EvaluasiController@tambah');
Route::post('/evaluasi/store', 'EvaluasiController@store');
//edit
Route::get('/evaluasi/edit/{params}', 'EvaluasiController@edit');
Route::post('/evaluasi/update', 'EvaluasiController@update');
//hapus 
Route::get('/evaluasi/hapus/{params}', 'EvaluasiController@hapus');


//menjalankan controller 
Route::get('/nilai', 'NilaiController@index')->name('nilai');
//search data 
Route::get('/nilai/cari','NilaiController@cari');
//tambah 
Route::get('/nilai/tambah', 'NilaiController@tambah');
Route::post('/nilai/store', 'NilaiController@store');
//edit
Route::get('/nilai/edit/{params}', 'NilaiController@edit');
Route::post('/nilai/update', 'NilaiController@update');
//hapus 
Route::get('/nilai/hapus/{params}', 'NilaiController@hapus');
//cetak nilai siswa
Route::get('/nilai/print-pdf', 'NilaiController@printPDF');