@extends('adminlte.layouts.app')

@section('title', 'Update Jadwal Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
@endpush


@section('content')
<div class="card-header">
<a href="/jadwal"class="btn btn-primary"> Kembali</a>
<br/>
</div>

<div class="card-body">
<form action="/jadwal/update" method="POST">
@foreach($jadwal as $j)
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $j->id}}"> <br/>

   

    <div class="form-group">
    <label>Nama Kelas</label>
    <input type="text"  required="required" name="nama_kelas" class="form-control" placeholder="Nama Kelas..." value="{{ $j-> nama_kelas}}"> <br/>
    
    <div class="form-group">
    <label>Hari</label>
    <input type="text"  required="required" name="hari" class="form-control" placeholder="Nama Hari..."  value="{{ $j-> hari}}"> <br/>

    <div class="form-group">
    <label>Waktu Mulai</label>
    <input type="time"  required="required" name="waktu_mulai"  class="form-control" placeholder="Waktu Mulai..."  value="{{ $j-> waktu_mulai}}"> <br/>
   
    <div class="form-group">
    <label>Waktu Akhir</label>
    <input type="time"  required="required" name="waktu_akhir" class="form-control" placeholder="Waktu Akhir..." value="{{ $j-> waktu_akhir}}"> <br/>
    
    <div class="form-group">
    <label>Maksimal Siswa</label>
    <input type="text"  required="required" name="max_siswa"class="form-control" placeholder="Maksimal Siswa..."  value="{{ $j-> max_siswa}}"> <br/>
   

    <input type="submit" class="btn btn-success" value="Simpan Data">
    </form>
</div>


    @endforeach
    @endsection
   