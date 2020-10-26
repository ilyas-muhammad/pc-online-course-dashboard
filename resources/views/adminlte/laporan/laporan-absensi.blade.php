@extends('adminlte.layouts.app')

@section('title', 'DATA ABSENSI SISWA')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Absensi Siswa</h3>
</div>



<div class="card-body">
<form action="{{ action('AbsensiController@report') }}" method="POST" class="form-inline">
        {{ csrf_field() }}
        <label>Kelas : </label>
        <select class="form-control" name="kelas">
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

    <a href="/absensi/print-pdf/{{ $kelas ?? 'nofilter' }}/{{ $date ?? 'nodate'}}" class="btn btn-primary" target="_blank">PRINT PDF</a>
    <a href="/absensi/print-excel/{{ $kelas ?? 'nofilter' }}/{{ $date ?? 'nodate'}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>


   
        <table id="absensitbl" class="table table-bordered table-hover projects">
            <thead>
                <tr>
                <th style="width: 10%">
                        Nama Siswa
                    </th>
                    <th style="width: 10%">
                        Nama Kelas
                    </th>
                    <th style="width: 10%">
                        Tanggal Absensi
                    </th>
                    <th style="width: 10%">
                        Keterangan
                    </th>
                   
                </tr>
            </thead>
            <tbody>
            @foreach ($absensi as $b)
            <tr>
                  <td> {{ $b-> name}}</td>
                  <td> {{ $b-> kelas}}</td>
                  <td> {{ $b-> tgl_absen}}</td>
                  <td> {{ $b-> keterangan}}</td>
                  
        
                </tr>
                </tr>
                @endforeach
            </tbody>
        </table>
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
      $("#absensitbl").DataTable({
        "columnDefs": [
            { "width": "10%", "targets": -1 }
        ]
      });
    });
</script>
@endpush