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

//menjalankan controller user
Route::get('/users', 'UserController@index')->name('users');
//search data user
Route::get('/users/cari','UserController@cari');


//one to many hari ke jadwal
//Route::get('/hari-jadwal', 'HariController@index');


//upload file pembayaran
Route::get('/upload',  'UploadController@upload')->name('upload');;
Route::post('/upload/proses', 'UploadController@process_upload');

