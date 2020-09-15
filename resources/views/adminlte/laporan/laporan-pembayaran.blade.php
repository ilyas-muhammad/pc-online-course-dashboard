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
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Laporan Data Pembayaran Siswa</h3>
</div>
    <div class="card-body">
    <form action="{{ action('UploadController@report') }}" method="POST" class="form-inline">
        {{ csrf_field() }}
        <label>Kelas : </label>
        <select name="kelas">
            <option value="nofilter">Pilih Kelas</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        
        <br/>
        <label>Tanggal : </label>
        <input type="date" name="tanggal" />
        <input class="btn btn-primary ml-3" type="submit" value="Tampilkan">
    </form>
    <br/>

    <a href="/upload/print-pdf/{{ $kelas ?? 'nofilter' }}/{{ $date ?? 'nodate'}}" class="btn btn-primary" target="_blank">PRINT PDF</a>
    <a href="/upload/print-excel/{{ $kelas ?? 'nofilter' }}/{{ $date ?? 'nodate'}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

    

<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>ID User</th>
            <th>Kelas</th>
            <th>Nama Bank</th>
            <th>No Rekening</th>
            <th>Tanggal Pembayaran</th>
            <th>Jumlah Transfer</th>
            <th width="10%">File</th>
            <th>Keterangan</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        @foreach($gambar as $g) 
        <tr>
        <td>{{$g -> name }} </td>
        <td>{{$g -> id_user }} </td>
        <td>{{$g -> kelas }} </td>
        <td>{{$g -> nama_bank}} </td>
        <td>{{$g -> no_rekening}} </td>
        <td>{{$g -> tgl_pembayaran }} </td>
        <td>{{$g -> jml_transfer }} </td>
        <td><img width="150px" src="{{ url('/images/'.$g->file) }}"></td>
        <td>{{$g -> keterangan }} </td>
        <td>{{$g -> status }} </td>

    </td>    
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