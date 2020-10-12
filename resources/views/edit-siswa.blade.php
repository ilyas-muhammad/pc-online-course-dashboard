@extends('adminlte.layouts.app')

@section('title', 'Update Data Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/siswa" class="btn btn-primary"> Kembali</a>
<br/>
<br/>

@foreach($siswa as $s)
<form action="/siswa/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $s->id}}"> <br/>

    <div class="form-group">
    <label>Nama Siswa</label>
    <input type="text"  required="required" name="name" class="form-control" placeholder="Nama Siswa .." value="{{ $s-> name}}"> <br/>

    <div class="form-group">
    <label>Email</label>
    <input type="text"  required="required" name="email" class="form-control" placeholder="Email .." value="{{ $s-> email}}"> <br/>

    <div class="form-group">
    <label>Kelas</label>
    <input type="text"  required="required" name="kelas" class="form-control" placeholder="Kelas .." value="{{ $s-> kelas}}"> <br/>

    <div class="form-group">
    <label>Jenis Kelamin</label>
    <input type="text"  required="required" name="jenkel" class="form-control" placeholder="Jenis Kelamin .." value="{{ $s-> jenkel}}"> <br/>

    <div class="form-group">
    <label>Status</label>
    <input type="text"  required="required" name="status"  class="form-control" placeholder="Status .." value="{{ $s-> status}}"> <br/><br/>

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