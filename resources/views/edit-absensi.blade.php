@extends('adminlte.layouts.app')

@section('title', 'Update Data Absensi Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/absensi" class="btn btn-primary"> Kembali</a>
<br/>
<br/>

@foreach($absensi as $b)
<form action="/absensi/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $b->id}}"> <br/>

    <div class="form-group">
    <label>Nama Siswa</label>
    <input type="text"  required="required" name="name" class="form-control" placeholder="Nama Siswa .." value="{{ $b-> name}}"> <br/>
   
    <div class="form-group">
    <label>Kelas</label>
    <input type="text"  required="required" name="kelas" class="form-control" placeholder="Kelas .." value="{{ $b-> kelas}}"> <br/>

    <div class="form-group">
    <label>Tanggal Absen</label>
    <input type="date"  required="required" name="tgl_absen" class="form-control" placeholder="Tanggal Absen .." value="{{ $b-> tgl_absen}}"> <br/>

    
    <div class="form-group">
    <label>Keterangan</label>
    <input type="text"  required="required" name="keterangan" class="form-control" placeholder="Keterangan .." value="{{ $b-> keterangan}}"> <br/><br/>

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