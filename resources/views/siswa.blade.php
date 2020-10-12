@extends('adminlte.layouts.app')

@section('title', 'DATA SISWA')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Siswa</h3>
</div>

<div class="form-group">
</div>

<br/>
<br/>

<div class="card-body">

<p> Cari Data Siswa : </p>
    <form action="/siswa/cari" method="GET" class="form-inline">
      <input class="form-control" type="text" name="cari" placeholder="Cari Siswa .." value="{{ old('cari') }}">
        <input class="btn btn-primary ml-3" type="submit" value="CARI">
    </form>
    <br/>
    
  
   
    <br /><br />
    
        <table class="table table-bordered table-hover projects" id="siswatbl" >
        
            <thead>
                <tr>
                    <th class='site_name' style="width: 20%">
                        Nama Siswa
                    </th>
                    <th style="width: 10%">
                        Email
                    </th>
                    <th style="width: 10%">
                        Kelas
                    </th>
                    <th style="width: 10%">
                        Jenis Kelamin
                    </th>
                    <th style="width: 5%" class="text-center">
                        Status
                    </th>
                    <th style="width: 20%">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($siswa as $s)
                <tr>
                  <td> {{ $s-> name}}</td>
                  <td> {{ $s-> email }}</td>
                  <td> {{ $s-> kelas }}</td>
                  <td> {{ $s-> jenkel }}</td>
                  <td> {{ $s-> status }}</td>
                    
                   
                    <td class="project-actions text-right">
                
                        <a class="btn btn-info btn-sm" href="siswa/edit/{{$s->id}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        @if ($users->level == 1)
                        <a class="btn btn-danger btn-sm" href="siswa/hapus/{{ $s->id}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                 @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
<!-- DataTables -->
{{-- <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script> --}}


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script>
    $(function () {
      $("#siswatbl").DataTable({
        "columnDefs": [
            { "width": "10%", "targets": -1 }
        ]
      });
    });
</script>
@endpush