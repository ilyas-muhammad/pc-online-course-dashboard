@extends('adminlte.layouts.app')

@section('title', 'Tambah Data Nilai Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')

<a href="/nilai"> Kembali</a>
<br/>
<br/>


{{--menampilkan erorr validasi--}}
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif 

<form action="/nilai/store" method="POST">
    {{ csrf_field()}}
    <div class="form-group">
        <label for="name">*Nama Siswa</label>
        <input class="form-control" type="text" name="name" value="{{ old ('name') }}">
    </div> 
  
    <div class="form-group">
    <b> Tanggal Evaluasi</b><br/>
        <input type="date" name="tgl_evaluasi" value="{{ old ('tgl_evaluasi') }}">
    </div> 

    <div class="form-group">
        <label for="kelas">*Kelas</label>
        <input class="form-control" type="text" name="kelas" value="{{ old ('kelas') }}">
    </div> 

    <div class="form-group">
        <label for="jenkel">*Jenis Kelamin</label>
        <input class="form-control" type="text" name="jenkel" value="{{ old ('jenkel') }}">
    </div> 

    <div class="form-group">
        <label for="skor">*Skor</label>
        <input class="form-control" type="text" name="skor" value="{{ old ('skor') }}">
    </div>

    
    
 <div class="form-group">
     <input class="btn btn-primary" type="submit" value ="Simpan Data">
 </div>
    </form>
   @endsection  

   @push('js')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "columnDefs": [
            { "width": "10%", "targets": -1 }
        ]
      });
    });
</script>
@endpush