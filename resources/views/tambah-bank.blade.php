
@extends('adminlte.layouts.app')

@section('title', 'Tambah Data Akun Bank')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')

<a href="/bank"> Kembali</a>
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

<form action="/bank/store" method="POST">
    {{ csrf_field()}}
    <div class="form-group">
        <label for="nama_bank">*Nama Bank</label>
        <input class="form-control" type="text" name="nama_bank" value="{{ old ('nama_bank') }}">
    </div> 
  
    <div class="form-group">
        <label for="nama_akun">*Nama Akun Bank</label>
        <input class="form-control" type="text" name="nama_akun" value="{{ old ('nama_akun') }}">
    </div> 

    <div class="form-group">
        <label for="no_rekening">*Nomor Rekening</label>
        <input class="form-control" type="text" name="no_rekening" value="{{ old ('no_rekening') }}">
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