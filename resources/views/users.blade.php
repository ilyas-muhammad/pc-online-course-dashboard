@extends('adminlte.layouts.app')

@section('title', 'USERS')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable</h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover projects">
            <thead>
                <tr>
                    <th style="width: 20%">
                        Nama Lengkap
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
                    <th style="width: 25%">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $u)
                <tr>
                  <td> {{ $u-> nama_lengkap }}</td>
                  <td> {{ $u-> kelas }}</td>
                  <td> {{ $u-> jenkel }}</td>
                  <td> {{ $u-> status }}</td>
                    
                   
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
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