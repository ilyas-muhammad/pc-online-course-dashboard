{{-- @extends('auth.master') --}}

<body style ="background-color:papayawhip;">

{{-- @section('content') --}}
<h1>BIMBEL AN - NAJM PRESTASI </h1>
    <img src="/images/logo.jpg" />
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
        <select name="kelas" value="{{ session()->get('register.kelas') }}" id="kelas">
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
        <br />
        <label for="jadwal">Jadwal</label>
        <select name="id_jadwal" id="jadwal" value="{{ session()->get('register.jadwal') }}">
            @foreach($jadwal ?? [] as $j)
            <option value="{{ $j->id }}">{{ $j->hari }} | {{ $j->waktu_mulai }} s/d {{ $j->waktu_akhir }}</option>
            @endforeach
        </select>
        </br>
        <a type="button" href="/register1" class="btn btn-warning">Back to Step Informasi Diri</a>
         <button type="submit" class="btn btn-primary">Continue</button>
     </form>
{{-- @endsection  --}}