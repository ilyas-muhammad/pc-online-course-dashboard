@extends('adminlte.layouts.app')

@section('title', 'KONFIRMASI PEMBAYARAN')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="row">
<div class="container">
    <div class="col-lg-8 mx-auto my-5">
    </div>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif

        <div class="card">
        <div class="card-header">
        <h3 class="card-title">Silahkan Konfirmasi Pembayaran</h3>
        </div>

        <div class="form-group">
        </div>
        <h4 class="my-5">Laporan Data Pembayaran Siswa</h4>

<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>ID User</th>
            <th>Nama Bank</th>
            <th>No Rekening</th>
            <th>Tanggal Pembayaran</th>
            <th width="10%">File</th>
            <th>Keterangan</th>
            <th>Status</th>

            @if ($user->level == 1)
            <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($gambar as $g) 
        <tr>
        <td>{{$g -> name }} </td>
        <td>{{$g -> id_user }} </td>
        <td>{{$g -> nama_bank}} </td>
        <td>{{$g -> no_rekening}} </td>
        <td>{{$g -> tgl_pembayaran }} </td>
        <td><img width="150px" src="{{ url('/images/'.$g->file) }}"></td>
        <td>{{$g -> keterangan }} </td>
        <td>{{$g -> status }} </td>
        
        @if ($user->level == 1)
        <td class="project-actions text-right">
        
        <a class="btn btn-info btn-sm" href="upload/approved/{{$g->id}}">
            <i class="fas fa-pencil-alt">
            </i>
            Approved
        </a>
        <a class="btn btn-danger btn-sm" href="upload/decline/{{ $g->id}}">
            <i class="fas fa-trash">
            </i>
            Decline
        </a>
    </td>
    @endif
    
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
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