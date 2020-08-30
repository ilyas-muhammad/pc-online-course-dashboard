@extends('adminlte.layouts.app')

@section('title', 'EVALUASI SISWA')

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
    <a href="/evaluasi/tambah"> 
    <input class="btn btn-primary ml-3" type="submit" value="Tambah Evaluasi Baru"></a>
@endif
<br/>
<br/>

<div class="card-body">
<p> Cari Evaluasi: </p>
    <form action="/evaluasi/cari" method="GET" class="form-inline">
      <input class="form-control" type="text" name="cari" placeholder="Cari Akun Evaluasi .." value="{{ old('cari') }}">
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
                        Link Evaluasi
                    </th>
                    <th style="width: 10%">
                        Skor
                    </th>
                    
                    @if ($user->level == 1)
                    <th style="width: 20%">
                        Actions
                    </th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @foreach ($evaluasi as $e)
            <tr>
                  <td> {{ $e-> name}}</td>
                  <td> {{ $e-> kelas}}</td>
                  <td> <a href="{{ $e-> nama_evaluasi}}" target="_blank"> {{ $e->nama_evaluasi }} </a></td>
                  <td> {{ $e-> skor}}</td>
                  
                  @if ($user->level == 1)
                  <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="evaluasi/edit/{{$e->id}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="evaluasi/hapus/{{ $e->id}}">
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