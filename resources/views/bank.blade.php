@extends('adminlte.layouts.app')

@section('title', 'DATA BANK ACCOUNT')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Bank Account</h3>
</div>

<div class="form-group">
</div>

<a href="/bank/tambah"> 
<input class="btn btn-primary ml-3" type="submit" value="Tambah Akun Bank Baru"> </a>
<br/>
<br/>

<div class="card-body">


    
        <table id="banktbl" class="table table-bordered table-hover projects">
            <thead>
                <tr>
                    <th style="width: 20%">
                        Nama Bank
                    </th>
                    <th style="width: 20%">
                        Nama Akun
                    </th>
                    <th style="width: 20%">
                        Nomor Rekening
                    </th>
                    <th style="width: 20%">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($bank as $b)
                <tr>
                  <td> {{ $b-> nama_bank}}</td>
                  <td> {{ $b-> nama_akun}}</td>
                  <td> {{ $b-> no_rekening}}</td>
                
                    
                   
                    <td class="project-actions text-right">
                
                        <a class="btn btn-info btn-sm" href="bank/edit/{{$b->id}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="bank/hapus/{{ $b->id}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
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
      $("#banktbl").DataTable({
        "columnDefs": [
            { "width": "10%", "targets": -1 }
        ]
      });
    });
</script>
@endpush