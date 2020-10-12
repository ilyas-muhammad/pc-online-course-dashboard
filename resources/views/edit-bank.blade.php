@extends('adminlte.layouts.app')

@section('title', 'Update Akun Bank')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/bank" class="btn btn-primary"> Kembali</a>
<br/>
<br/>

@foreach($bank as $b)
<form action="/bank/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $b->id}}"> <br/>

    <div class="form-group">
    <label>Nama Bank</label>
    <input type="text"  required="required" name="nama_bank" class="form-control" placeholder="Nama Bank .." value="{{ $b-> nama_bank}}"> <br/>
   
    <div class="form-group">
    <label>Nama Akun Bank</label>
    <input type="text"  required="required" name="nama_akun" class="form-control" placeholder="Nama Akun Bank .." value="{{ $b-> nama_akun}}"> <br/>
    
    <div class="form-group">
    <label>No Rekening</label>
    <input type="text"  required="required" name="no_rekening" class="form-control" placeholder="Nama Rekening .." value="{{ $b-> no_rekening}}"> <br/>


    <input type="submit" class="btn btn-success"  value="Simpan Data">
    </form>
    @endforeach
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