{{-- @extends('auth.master') --}}

<body style ="background-color:papayawhip;">


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div style="border-radius:40px; margin-top:50px; margin-left:550px; background-color:thistle; width:500px; border-width:2px; border-style:solid; padding:30px;">
<div style="text-align:center;">
<h2>BIMBEL AN - NAJM PRESTASI </h2>
<img src="/images/logo.jpg" class="mx-auto d-block"/>
<br /> 
</div>
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
        <b> Nama </b><br/>
        <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ session()->get('register.name') }}">
        
        </div>
       
        <div class="form-group">
        <b> Email </b><br/>
        <input type="text" name="email" class="form-control" placeholder="Enter email" value="{{ session()->get('register.email') }}">
     
        </div>

        <div class="form-group">
         <b> Jenis Kelamin </b><br/>
        <input type="radio" name="jenkel" class="form-controll" value="P" id="perempuan">
        <label for="perempuan">Perempuan</label>
        <input type="radio" name="jenkel" class="form-controll" value="L" id="laki">
        <label for="laki">Laki-Laki</label>
        <br /> 
        </div>

        <div class="form-group">
         <b> Password</b><br/>
        <input type="password" name="password" class="form-control" placeholder="Enter password" value="{{ session()->get('register.password') }}">
        <br /> 
        </div>

        <div class="form-group">
        <input type="submit" class="btn btn-success" value="Next">
        </div>
     </form>
</div>
    
{{-- @endsection  --}}

@push('js')
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush