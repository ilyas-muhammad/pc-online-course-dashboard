@extends('adminlte.layouts.app')

@section('title', 'Update Akun Bank')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/bank"> Kembali</a>
<br/>
<br/>

@foreach($bank as $b)
<form action="/bank/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $b->id}}"> <br/>

    Nama  Bank : <input type="text"  required="required" name="nama_bank" value="{{ $b-> nama_bank}}"> <br/><br/>
    Nama Akun Bank : <input type="text"  required="required" name="nama_akun" value="{{ $b-> nama_akun}}"> <br/><br/>
    No Rekening : <input type="text"  required="required" name="no_rekening" value="{{ $b-> no_rekening}}"> <br/><br/>


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