<html>
<head>


<title> Print Data Pembayaran Siswa</title>


<link rel="stylesheet" href="https:/.stackpath.bootstrapcdn.com/botstrap/4.3.1/css/bostrap.min.css"
integrity="sha384-ggOyr0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhxWr7x9JvoRxT2MZw1T"
crossorigin="anonymous">

</head>
<body>

<style type="text/css">
table tr td,
table tr th{
    font-size : 14pt;
}
</style>
<center>
    <h5> Data Pembayaran Siswa<h4>
    
    </center>

    <div class="card">
    <div class="card-header">
        
</div>
<table border="1.5" class=table table-bordered">

    <tr>
                    <th>Nama Siswa</th>
                    <th>ID User</th>
                    <th>Kelas</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Jumlah Transfer</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    </tr>
                @foreach($gambar as $g) 
                <tr>
                <td>{{$g -> name }} </td>
                <td>{{$g -> id_user }} </td>
                <td>{{$g -> kelas }} </td>
                <td>{{$g -> nama_bank}} </td>
                <td>{{$g -> no_rekening}} </td>
                <td>{{$g -> tgl_pembayaran }} </td>
                <td>{{$g -> jml_transfer  }} </td>
                <td>{{$g -> keterangan }} </td>
                <td>{{$g -> status }} </td>
                </tr>
                @endforeach
    
        </table>
        </body>
        </html>