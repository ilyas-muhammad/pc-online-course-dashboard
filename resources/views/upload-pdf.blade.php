<html>
<head>


<title> Print Data Siswa</title>


<style type="text/css">
    table tr td,
    table tr th{
        font-size : 16pt;
    }
</style>
</head>
<body>
    <h5> Data Pembayaran Siswa<h4>
    
    <table class="table table-bordered">

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