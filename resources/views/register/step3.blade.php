extends('auth.master')

{{-- Title --}}
@section('title', 'Step 2 - Register)

@section('content')
<div class="row">
<div class="container">
    <div class="col-lg-8 mx-auto my-5">

    <h1>Step 1</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif



        <form action="/register3" method="POST" enctype="multipart/form-data">
            {{csrf_field () }}

            <div class="form-group">
                <b> Nama Siswa</b><br/>
                <input type="text" name="name" class="form-control input-lg" />
            </div>
            

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
                <input type ="file" name="file">
            </div>

            <div class="form-group">
                <b> Keterangan</b><br/>
                <textarea class="form-control" name="keterangan"></textarea>
            </div>


            <input type="submit" value="Upload" class="btn btn-primary">
        </form>

        <h4 class="my-5">Galery</h4>

        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Tanggal Pembayaran</th>
                    <th width="10%">File</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gambar as $g) 
                <tr>
                <td>{{$g -> name}} </td>
                <td>{{$g -> nama_bank}} </td>
                <td>{{$g -> no_rekening}} </td>
                <td>{{$g -> tgl_pembayaran }} </td>
                <td><img width="150px" src="{{ url('/images/'.$g->file) }}"></td>
                <td>{{$g -> keterangan }} </td>
                <td>{{$g -> status }} </td>
                <td class="project-actions text-right">
                
                <a class="btn btn-info btn-sm" href="upload/approved/{{$g->id}}">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Approved
                </a>
                <a class="btn btn-danger btn-sm" href="upload/decline/{{ $g->id}}">
                    <i class="fas fa-trash">
                    </i>
                    Decline
                </a>
            </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection