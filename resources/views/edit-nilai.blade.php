@extends('adminlte.layouts.app')

@section('title', 'Update Data Nilai Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/nilai" class="btn btn-primary"> Kembali</a>
<br/>
<br/>

@foreach($nilai as $n)
<form action="/nilai/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $n->id}}"> <br/>

    <div class="form-group">
    <label>Nama Siswa</label>
    <input type="text"  required="required" name="name" class="form-control" placeholder="Nama Siswa .." value="{{ $n-> name}}"> <br/>

    <div class="form-group">
    <label>Tanggal Evaluasi</label>
    <input type="date"  required="required" name="tgl_evaluasi" class="form-control" placeholder="Tanggal Evaluasi .." value="{{ $n-> tgl_evaluasi}}"> <br/>

    <div class="form-group">
    <label>Kelas</label>
    <input type="text"  required="required" name="kelas" class="form-control" placeholder="Kelas .." value="{{ $n-> kelas}}"> <br/>

    <div class="form-group">
    <label>Jenis Kelamin</label>
    <input type="text"  required="required" name="jenkel" class="form-control" placeholder="Jenis Kelamin .."  value="{{ $n-> jenkel}}"> <br/>

    <div class="form-group">
    <label>Skor</label>
    <input type="text"  required="required" name="skor" class="form-control" placeholder="Skor .." value="{{ $n-> skor}}"> <br/><br/>

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