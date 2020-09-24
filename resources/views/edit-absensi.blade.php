@extends('adminlte.layouts.app')

@section('title', 'Update Data Absensi Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/absensi"> Kembali</a>
<br/>
<br/>

@foreach($absensi as $b)
<form action="/absensi/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $b->id}}"> <br/>

    Nama  Siswa: <input type="text"  required="required" name="name" value="{{ $b-> name}}"> <br/><br/>
   
    Kelas : <input type="text"  required="required" name="kelas" value="{{ $b-> kelas}}"> <br/><br/>
    Tanggal Absen: <input type="date"  required="required" name="tgl_absen" value="{{ $b-> tgl_absen}}"> <br/><br/>
    Keterangan: <input type="text"  required="required" name="keterangan" value="{{ $b-> keterangan}}"> <br/><br/>

    <input type="submit" value="Simpan Data">
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