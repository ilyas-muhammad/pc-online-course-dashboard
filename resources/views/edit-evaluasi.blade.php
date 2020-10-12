@extends('adminlte.layouts.app')

@section('title', 'Update Data Evaluasi Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/evaluasi" class="btn btn-primary"> Kembali</a>
<br/>
<br/>

@foreach($evaluasi as $e)
<form action="/evaluasi/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $e->id}}"> <br/>

    <div class="form-group">
    <label>Nama Siswa</label>
    <input type="text"  required="required"   name="name" class="form-control" placeholder="Nama Siswa .." value="{{ $e-> name}}"> <br/>
   
    <div class="form-group">
    <label>Kelas</label>
    <input type="text"  required="required" name="kelas" class="form-control" placeholder="Kelas .." value="{{ $e-> kelas}}"> <br/>

    <div class="form-group">
    <label>Link Evaluasi</label>
   <input type="text"  required="required" name="nama_evaluasi" class="form-control" placeholder="Link Evaluasi .." value="{{ $e-> nama_evaluasi}}"> <br/>

    <div class="form-group">
    <label>Skor</label>
    <input type="text"  required="required" name="skor" class="form-control" placeholder="Skor .." value="{{ $e-> skor}}"> <br/>

    <input type="submit" class="btn btn-success" value="Simpan Data">
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