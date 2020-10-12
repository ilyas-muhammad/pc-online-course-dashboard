{{-- @extends('auth.master') --}}

<body style ="background-color:papayawhip;">

{{-- @section('content') --}}

<div style="border-radius:25px; margin-top:150px; margin-left:550px; background-color:thistle; width:400px; border-width:1px; border-style:solid; padding:20px;">
<div style="text-align:center;">
<h2>BIMBEL AN - NAJM PRESTASI </h2>
    <img src="/images/logo.jpg" />
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