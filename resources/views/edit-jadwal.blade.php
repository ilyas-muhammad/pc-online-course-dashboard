@extends('adminlte.layouts.app')

@section('title', 'Update Jadwal Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/jadwal"> Kembali</a>
<br/>
<br/>

@foreach($jadwal as $j)
<form action="/jadwal/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $s->id}}"> <br/>

    Nama Siswa: <input type="text"  required="required" name="name" value="{{ $j-> name}}"> <br/><br/>
    Nama Kelas : <input type="text"  required="required" name="nama_kelas" value="{{ $j-> email}}"> <br/><br/>
    Hari     : <input type="text"  required="required" name="hari" value="{{ $j-> hari}}"> <br/><br/>
    Maksimal Siswa  : <input type="text"  required="required" name="max_siswa" value="{{ $s-> max_siswa}}"> <br/><br/>
   

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