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
        <h3 class="card-title">Data Evaluasi Siswa</h3>
</div>

<div class="form-group">
</div>

@if ($user->level == 1)
    <a href="/absensi/tambah"> 
    <input class="btn btn-primary ml-3" type="submit" value="Tambah Absensi Baru"></a>
@endif
<br/>
<br/>

<div class="card-body">
<p> Cari Absensi: </p>
    <form action="/absensi/cari" method="GET" class="form-inline">
      <input class="form-control" type="text" name="cari" placeholder="Cari Akun Absensi .." value="{{ old('cari') }}">
        <input class="btn btn-primary ml-3" type="submit" value="CARI">
    </form>
    <br/>

   
        <table id="example1" class="table table-bordered table-hover projects">
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
                    
                    @if ($user->level == 1)
                    <th style="width: 20%">
                        Actions
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @foreach ($absensi as $b)
            <tr>
                  <td> {{ $b-> name}}</td>
                  <td> {{ $b-> kelas}}</td>
                  <td> {{ $b-> tgl_absen}}</td>
                  <td> {{ $b-> keterangan}}</td>
                  
                  @if ($user->level == 1)
                  <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="absensi/edit/{{$b->id}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="absensi/hapus/{{ $b->id}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                  </td>
                  @endif
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