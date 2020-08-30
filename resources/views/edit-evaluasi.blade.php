@extends('adminlte.layouts.app')

@section('title', 'Update Data Evaluasi Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/evaluasi"> Kembali</a>
<br/>
<br/>

@foreach($evaluasi as $e)
<form action="/evaluasi/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $e->id}}"> <br/>

    Nama  Siswa: <input type="text"  required="required" name="name" value="{{ $e-> name}}"> <br/><br/>
   
    Kelas : <input type="text"  required="required" name="kelas" value="{{ $e-> kelas}}"> <br/><br/>
    Link Evaluasi: <input type="text"  required="required" name="nama_evaluasi" value="{{ $e-> nama_evaluasi}}"> <br/><br/>
    Skor : <input type="text"  required="required" name="skor" value="{{ $e-> skor}}"> <br/><br/>

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