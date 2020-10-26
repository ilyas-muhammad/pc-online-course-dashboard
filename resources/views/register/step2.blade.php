{{-- @extends('auth.master') --}}

<body style ="background-image: url(assets/bg/bg.jpg);">


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


{{-- @section('content') --}}
<div style="border-radius:25px; margin-top:150px; margin-left:500px; background-color:thistle; width:650px; border-width:2px; border-style:solid; padding:20px;">
<div style="text-align:center;">
<h1>BIMBEL AN - NAJM PRESTASI </h1>
    <img src="/images/logo.jpg" />
    <br /> 
    </div>
    <p> Silahkan Pilih Jadwal dan Kelas </p>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
     <form action="/register2" method="POST">
        @csrf
     {{-- <input type="number" name="level" class="form-controll" placeholder="Enter level" value="{{ session()->get('register.level') }}"> --}}
        
     <div class="form-group">
       
        <label for="kelas">Kelas</label>
        <select  class="form-control" id="sel1"  name="kelas" value="{{ session()->get('register.kelas') }}" id="kelas">
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
</div>
        
        <label for="jadwal">Jadwal</label>
        <select class="form-control" id="sel1" name="id_jadwal" id="jadwal" value="{{ session()->get('register.jadwal') }}">
            @foreach($jadwal ?? [] as $j)
            <option value="{{ $j->id }}">{{ $j->hari }} | {{ $j->waktu_mulai }} s/d {{ $j->waktu_akhir }}</option>
            @endforeach
        </select>
        </br>
        <a type="button" href="/register1" class="btn btn-warning">Back to Step Informasi Diri</a>
         <button type="submit" class="btn btn-primary">Next</button>
     </form>
</div>

{{-- @endsection  --}}
