@extends('adminlte.layouts.app')

@section('title', 'Update Data Users')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="/users" class="btn btn-primary"> Kembali</a>
<br/>
<br/>

@foreach($users as $u)
<form action="/users/update" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{ $u->id}}"> <br/>

    <div class="form-group">
    <label>Nama User</label>
    <input type="text"  required="required" name="name" class="form-control" placeholder="Nama User .." value="{{ $u-> name}}"> <br/>

    <div class="form-group">
    <label>Email</label>
    <input type="text"  required="required" name="email" class="form-control" placeholder="Email .." value="{{ $u-> email}}"> <br/>

    <div class="form-group">
    <label>Password</label>
    <input type="password"  required="required" name="password" class="form-control" > <br/>

    <div class="form-group">
    <label>Status</label>
    <input type="text"  required="required" name="status" class="form-control" placeholder="Status .." value="{{ $u-> status}}"> <br/><br/>

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