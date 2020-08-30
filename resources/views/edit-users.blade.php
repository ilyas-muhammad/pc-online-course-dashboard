@extends('adminlte.layouts.app')

@section('title', 'Update Data Users')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/users"> Kembali</a>
<br/>
<br/>

@foreach($users as $u)
<form action="/users/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $u->id}}"> <br/>

    Nama : <input type="text"  required="required" name="name" value="{{ $u-> name}}"> <br/><br/>
    Email : <input type="text"  required="required" name="email" value="{{ $u-> email}}"> <br/><br/>
    Password : <input type="password"  required="required" name="password"> <br/><br/>
    Status : <input type="text"  required="required" name="status" value="{{ $u-> status}}"> <br/><br/>

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