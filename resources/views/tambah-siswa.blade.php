
@extends('adminlte.layouts.app')

@section('title', 'Tambah Data Siswa')

{{-- Custom CSS --}}
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush

@section('content')

<a href="/siswa" class="btn btn-outline-info"> Kembali</a>
<br/>
<br/>


{{--menampilkan erorr validasi--}}
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif 

<form action="/siswa/store" method="POST" >
    {{ csrf_field()}}
    <div class="form-group">
        <label for="name">*Name</label><br />
        <select name="name">
        @foreach($siswa as $s)
                <option value="{{ $s->id_users }}">{{ $s->name }}</option>
            @endforeach
        </select>
    </div> 
    <div class="form-group">
        <label for="email">*Email</label>
        <input class="form-control" type="text" name="email" value="{{ old ('email') }}">
        
    </div> 

    <div class="form-group">
        <label for="kelas">*Kelas</label>
        <input class="form-control" type="text" name="kelas" value="{{ old ('kelas') }}">
    </div> 

    <div class="form-group">
        <label for="jenkel">*Jenis Kelamin</label>
        <input class="form-control" type="text" name="jenkel" value="{{ old ('jenkel') }}">
    </div> 

    <div class="form-group">
        <label for="status">*Status</label>
        <input class="form-control" type="text" name="status" value="{{ old ('name') }}">
    </div> 

    
    
 <div class="form-group">
     <input class="btn btn-primary" type="submit" value ="Simpan Data">
 </div>
    </form>
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