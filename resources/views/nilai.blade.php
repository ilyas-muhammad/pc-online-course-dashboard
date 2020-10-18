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

<div class="form-group">
</div>

<a href="/nilai/tambah"> 
<input class="btn btn-primary ml-3" type="submit" value="Tambah Data Nilai Baru"> </a>
<br/>
<br/>
<div class="card-body">
    <br/><br/>
    
        <table id="nilaitbl" class="table table-bordered table-hover projects">
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
                    <th style="width: 20%">
                        Actions
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
                    
                   
                    <td class="project-actions text-right">
                
                        <a class="btn btn-info btn-sm" href="nilai/edit/{{$n->id}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="nilai/hapus/{{ $n->id}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
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
      $("#nilaitbl").DataTable({
        "columnDefs": [
            { "width": "10%", "targets": -1 }
        ]
      });
    });
</script>
@endpush