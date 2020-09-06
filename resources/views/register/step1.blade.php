{{-- @extends('auth.master') --}}

{{-- @section('content') --}}
    <h1>Informasi Diri</h1>
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
        <input type="text" name="name" class="form-controll" placeholder="Enter name" value="{{ session()->get('register.name') }}">
        <br /> <br />
        <input type="text" name="email" class="form-controll" placeholder="Enter email" value="{{ session()->get('register.email') }}">
        <br /> <br />
        <input type="radio" name="jenkel" class="form-controll" value="P" id="perempuan">
        <label for="perempuan">Perempuan</label>
        <input type="radio" name="jenkel" class="form-controll" value="L" id="laki">
        <label for="laki">Laki-Laki</label>
        <br /> <br />
        <input type="password" name="password" class="form-controll" placeholder="Enter password" value="{{ session()->get('register.password') }}">
        <br /> <br />
        <button type="submit" class="btn btn-primary">Continue</button>
     </form>
{{-- @endsection  --}}