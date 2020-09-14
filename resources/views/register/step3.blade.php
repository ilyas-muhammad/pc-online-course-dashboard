{{-- @extends('auth.master') --}}

{{-- @section('content') --}}
<h1>BIMBEL AN - NAJM PRESTASI </h1>
    <img src="/images/logo.jpg" />
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
{{-- @endsection  --}}