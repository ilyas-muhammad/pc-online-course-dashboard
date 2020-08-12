@extends('adminlte.layouts.app')

@section('title', 'JADWAL SISWA')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Jadwal Siswa</h3>
</div>

<div class="form-group">
</div>

<a href="/jadwal/tambah"> + Tambah Jadwal Baru</a>
<br/>
<br/>

<p> Cari Jadwal Siswa : </p>
    <form action="/jadwal/cari" method="GET" class="form-inline">
      <input class="form-control" type="text" name="cari" placeholder="Cari Jadwal .." value="{{ old('cari') }}">
        <input class="btn btn-primary ml-3" type="submit" value="CARI">a
    </form>
    <br/>
    
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover projects">
            <thead>
                <tr>
                    <th style="width: 20%">
                        Nama Siswa
                    </th>
                    <th style="width: 20%">
                        Nama Kelas
                    </th>
                    <th style="width: 10%">
                        Hari
                    </th>
                    <th style="width: 10%">
                        Maksimal Siswa
                    </th>
                    <th style="width: 20%">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($jadwal as $j)
                <tr>
                 <td> @foreach($j->siswa as $s)
                                {{ $s->name }}<br /> 
                                @endforeach</td>
                  <td> {{ $j-> nama_kelas}}</td>
                  <td> @foreach($j->hari as $h)
                                {{ $h->hari }}<br /> 
                                @endforeach</td>
                  <td> {{ $j-> max_siswa }}</td>

                    
                   
                    <td class="project-actions text-right">
                
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
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