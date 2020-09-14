@extends('adminlte.layouts.app')

@section('title', 'Update Jadwal Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/jadwal"> Kembali</a>
<br/>
<br/>


<form action="/jadwal/update" method="POST">
@foreach($jadwal as $j)
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $j->id}}"> <br/>

   

    <div class="form-group">
    Nama Kelas : <input type="text"  required="required" name="nama_kelas" value="{{ $j-> nama_kelas}}"> <br/><br/>
    Hari     : <input type="text"  required="required" name="hari" value="{{ $j-> hari}}"> <br/><br/>
    Maksimal Siswa  : <input type="text"  required="required" name="max_siswa" value="{{ $j-> max_siswa}}"> <br/><br/>
   

    <input type="submit" value="Simpan Data">
    </form>
    @endforeach
    @endsection
   