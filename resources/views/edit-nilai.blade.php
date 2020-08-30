@extends('adminlte.layouts.app')

@section('title', 'Update Data Nilai Siswa')

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

@foreach($nilai as $n)
<form action="/nilai/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $n->id}}"> <br/>

    Nama  Siswa: <input type="text"  required="required" name="name" value="{{ $n-> name}}"> <br/><br/>
    Tgl Evaluasi: <input type="date"  required="required" name="tgl_evaluasi" value="{{ $n-> tgl_evaluasi}}"> <br/><br/>
    Kelas : <input type="text"  required="required" name="kelas" value="{{ $n-> kelas}}"> <br/><br/>
    Jenis Kelamin : <input type="text"  required="required" name="jenkel" value="{{ $n-> jenkel}}"> <br/><br/>
    Skor : <input type="text"  required="required" name="skor" value="{{ $n-> skor}}"> <br/><br/>

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