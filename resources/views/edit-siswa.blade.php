@extends('adminlte.layouts.app')

@section('title', 'Update Data Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/siswa"> Kembali</a>
<br/>
<br/>

@foreach($siswa as $s)
<form action="/siswa/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $s->id}}"> <br/>

    Nama : <input type="text"  required="required" name="name" value="{{ $s-> name}}"> <br/><br/>
    Email : <input type="text"  required="required" name="email" value="{{ $s-> email}}"> <br/><br/>
    Kelas : <input type="text"  required="required" name="kelas" value="{{ $s-> kelas}}"> <br/><br/>
    Jenis Kelamin  : <input type="text"  required="required" name="jenkel" value="{{ $s-> jenkel}}"> <br/><br/>
    Status : <input type="text"  required="required" name="status" value="{{ $s-> status}}"> <br/><br/>

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