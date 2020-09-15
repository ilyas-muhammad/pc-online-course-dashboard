

@extends('adminlte.layouts.app')

@section('title', 'ABSENSI KEHADIRAN SISWA')

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

    div class="card-body">

<form action="{{ action('AbsenController@report') }}" method="POST" class="form-inline">
    {{ csrf_field() }}
    <label>Kelas : </label>
    <select name="kelas">
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
    <input class="btn btn-primary ml-3" type="submit" value="Tampilkan">
</form>
<br/>

<a href="/absen/print-pdf/{{ $kelas ?? 'nofilter' }}" class="btn btn-primary" target="_blank">PRINT PDF</a>
<a href="/absen/print-excel/{{ $kelas ?? 'nofilter' }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>


        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Waktu Absen</th>
                    <th>Action</th>
                 
                </tr>
            </thead>

            <tbody>
                @foreach($absen as $a)
                <tr>
                <td> {{ $a->name }} </td>
                <td> {{ $a->kelas }} </td>
                <td> {{ $a->kelas }} </td>
                <td> {{ $a->kelas }} </td>
                <td> {{ $a->kelas }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
</div>
</div>
@endsection
