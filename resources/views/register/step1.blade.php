{{-- @extends('auth.master') --}}

{{-- @section('content') --}}
    <h1>BIMBEL AN - NAJM PRESTASI </h1>
    <img src="/images/logo.jpg" />
    <p> Silahkan Isi Data Diri Anda! </p>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
     <form action="/register1" method="POST">
        @csrf

        <div class="form-group">
         <b> Nama Siswa</b><br/>
        <input type="text" name="name" class="form-controll" placeholder="Enter name" value="{{ session()->get('register.name') }}">
        <br /> <br />
        </div>
       
        <div class="form-group">
         <b> Email Siswa</b><br/>
        <input type="text" name="email" class="form-controll" placeholder="Enter email" value="{{ session()->get('register.email') }}">
        <br /> <br />
        </div>

        <div class="form-group">
         <b> Jenis Kelamin </b><br/>
        <input type="radio" name="jenkel" class="form-controll" value="P" id="perempuan">
        <label for="perempuan">Perempuan</label>
        <input type="radio" name="jenkel" class="form-controll" value="L" id="laki">
        <label for="laki">Laki-Laki</label>
        <br /> <br />
        </div>

        <div class="form-group">
         <b> Password</b><br/>
        <input type="password" name="password" class="form-controll" placeholder="Enter password" value="{{ session()->get('register.password') }}">
        <br /> <br />
        </div>

        <input class="btn btn-primary ml-3" type="submit" value="Next">
     </form>
{{-- @endsection  --}}