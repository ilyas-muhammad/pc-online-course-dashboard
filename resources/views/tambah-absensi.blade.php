@extends('adminlte.layouts.app')

@section('title', 'Tambah Data Absensi Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush

@section('content')


<a href="/absensi"  class="btn btn-outline-info"> Kembali</a>
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

<form action="/absensi/store" method="POST">
    {{ csrf_field()}}
    <div class="form-group">
        <label for="name">*Nama Siswa</label> <br />
     <select  class="form-control" id="sel1" name="name">
            @foreach($siswa as $data)
                <option value="{{ $data->id_users }}">{{ $data->name }}</option>
            @endforeach
        </select>
    </div> 
  
    <div class="form-group">
        <label for="kelas">*Kelas</label>
        <input class="form-control" type="text" name="kelas" value="{{ old ('kelas') }}">
    </div> 

    <div class="form-group">
    <b> Tanggal Absensi</b><br/>
        <input type="date" name="tgl_absen" value="{{ old ('tgl_absen') }}">
    </div> 

    <div class="form-group">
        <label for="keterangan">*Keterangan</label>
        <input class="form-control" type="text" name="keterangan" value="{{ old ('keterangan') }}">
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
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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