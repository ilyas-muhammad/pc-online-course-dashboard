{{-- @extends('auth.master') --}}

<body style ="background-image: url(assets/bg/bg.jpg);">

{{-- @section('content') --}}
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div style="border-radius:25px; margin-top:50px; margin-left:550px; background-color:thistle; width:600px; border-width:2px; border-style:solid; padding:20px;">
<div style="text-align:center;">
<h2>BIMBEL AN - NAJM PRESTASI </h2>
    <img src="/images/logo.jpg" />
    <br />
    <br />
    </div>
    <p> Silahkan Konfirmasi Pembayaran Anda! </p>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
     <form action="/register3" method="POST" enctype="multipart/form-data">
        @csrf
            {{ csrf_field() }}

            <div class="form-group">
                <b> Nama Bank</b><br/>
                <input type="text" name="nama_bank" class="form-control input-lg" />
            </div>

            <div class="form-group">
                <b> Nomor Rekening</b><br/>
                <input type="text" name="no_rekening" class="form-control input-lg" />
            </div>


            <div class="form-group">
                <b> Jumlah Transfer</b><br/>
                <input type="text" name="jml_transfer" class="form-control input-lg" />
            </div>


            <div class="form-group">
                <b> Tanggal Pembayaran</b><br/>
                <input type="date" name="tgl_pembayaran" class="form-control input-lg" />
            </div>

            <div class="form-group">
                <b> File Gambar</b><br/>
                <input type="file" name="file" />
            </div>

            <div class="form-group">
                <b> Keterangan</b><br/>
                <textarea class="form-control" name="keterangan"></textarea>
            </div>


            <a type="button" href="/register2" class="btn btn-warning">Back to Step 2</a>
            <button type="submit" class="btn btn-primary">Continue</button>
     </form>
</div>

{{-- @endsection  --}}