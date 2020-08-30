@extends('adminlte.layouts.app')

@section('title', 'DATA USER')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data User</h3>
</div>

<div class="form-group">
</div>

<a href="/users/tambah"> 
<input class="btn btn-primary ml-3" type="submit" value="Tambah User Baru"> </a>
<br/>
<br/>

<div class="card-body">
<p> Cari Data User : </p>
    <form action="/users/cari" method="GET" class="form-inline">
      <input class="form-control" type="text" name="cari" placeholder="Cari User .." value="{{ old('cari') }}">
        <input class="btn btn-primary ml-3" type="submit" value="CARI">
    </form>
    <br/>
    
  
        <table id="example1" class="table table-bordered table-hover projects">
            <thead>
                <tr>
                    <th style="width: 20%">
                        Nama User
                    </th>
                    <th style="width: 10%">
                        Email
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
            @foreach ($users as $u)
                <tr>
                  <td> {{ $u-> name}}</td>
                  <td> {{ $u-> email }}</td>
                  <td> {{ $u-> status }}</td>
                    
                   
                    <td class="project-actions text-right">
                
                        <a class="btn btn-info btn-sm" href="users/edit/{{$u->id}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="users/edit/{{$u->id}}">
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