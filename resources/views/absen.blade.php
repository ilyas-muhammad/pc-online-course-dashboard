

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

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif

        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Hari</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Status</th>
                    <th>Jam Absen</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    @foreach($jadwal as $idx => $j)
                <td> {{ $siswa->name }} </td>

                <td>{{ $j->hari }}</td>
                <td>{{ $j->waktu_mulai }}</td>
                <td>{{ $j->waktu_akhir }}</td>
                <td>{{ $absen[$idx]->status ?? '' }}</td>
                <td>{{ $absen[$idx]->waktu_absen ?? '' }}</td>
                <td class="project-actions text-right">
                
                <a class="btn btn-info btn-sm" href="/present/{{ $siswa->id }}/{{ $j->id }}">
                    <i class="fas fa-pencil-alt">
                    </i>
                   Hadir
                </a>
               
            </td>
            @endforeach
                </tr>
            </tbody>
        </table>
        </div>
</div>
</div>
@endsection
