@extends('auth.master')

{{-- Title --}}
@section('title', 'Step 1 - Register)

    <h1>Step 1</h1>
     
        <form action="/register1" method="POST">
        @csrf
        <div class="input-group mb-3">
        <input type="text" class="form-control "name="nama_kelas"
             required autocomplete="nama_kelas" autofocus placeholder="nama_kelas">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="email" class="form-control "name="email"
            required autocomplete="email" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control "name="password" required
            autocomplete="new-password" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
            placeholder="Retype password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="kelas" required
            placeholder="Kelas">
    </div>
    <div class="input-group mb-3">
        <input type="date" class="form-control" name="ttl" required
            placeholder="Tempat Tanggal Lahir">
    </div>
    <div class="input-group mb-3">
        <select name="jenkel">
            <option value="P">Perempuan</option>
            <option value="L">Laki-laki</option>
        </select>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="no_telp" required
            placeholder="Nomor Telepon">
    </div>
              <button type="submit" class="btn btn-primary">Continue</button>
     </form>
@endsection 