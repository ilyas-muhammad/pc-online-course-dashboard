@extends('adminlte.layouts.app')

@section('title', 'NILAI SISWA')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Nilai Siswa</h3>
</div>


<div class="card-body">

<form action="{{ action('NilaiController@report') }}" method="POST" class="form-inline">
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
        <input class="btn btn-primary ml-3" type="submit" value="Tampilkan"><br/><br/>

        
        <br/>
        <label>Tanggal : </label>
        <input type="date" name="tanggal" />
        <input class="btn btn-primary ml-3" type="submit" value="Tampilkan">
    </form>
    <br/>

<a href="/nilai/print-pdf/{{ $kelas ?? 'nofilter' }}" class="btn btn-primary" target="_blank">PRINT PDF</a>
 <a href="/nilai/print-excel/{{ $kelas ?? 'nofilter' }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

    
        <table id="example1" class="table table-bordered table-hover projects">
            <thead>
                <tr>
                    <th style="width: 20%">
                        Nama Siswa
                    </th>
                    <th style="width: 10%">
                        Tanggal Evaluasi
                    </th>
                    <th style="width: 10%">
                        Kelas
                    </th>
                    <th style="width: 5%">
                     Jenis Kelamin
                    </th>
                    <th style="width: 10%">
                    Skor
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($nilai as $n)
                <tr>
                  <td> {{ $n-> name}}</td>
                  <td> {{ $n-> tgl_evaluasi}}</td>
                  <td> {{ $n-> kelas}}</td>
                  <td> {{ $n-> jenkel}}</td>
                  <td> {{ $n-> skor}}</td>
                    </td>
                </tr>
                </tr>
            </tbody>
            @endforeach
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
      $("#example1").DataTable({
        "columnDefs": [
            { "width": "10%", "targets": -1 }
        ]
      });
    });
</script>
@endpush