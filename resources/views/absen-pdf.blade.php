!DOCTYPE html>
<html>
<head>


<title> Print Data Siswa</title>
<link rel="stylesheet" href="https:/.stackpath.bootstrapcdn.com/botstrap/4.3.1/css/bostrap.min.css"
integrity="sha384-ggOyr0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhxWr7x9JvoRxT2MZw1T"
crossorigin="anonymous">

</head>
<body>


<style type="text/css">
table tr td,
table tr th{
    font-size : 16pt;
}
</style>
<center>
    <h5> Data Nilai Siswa<h4>
    </center>

    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Nilai Siswa</h3>
</div>

<table border="1.5" class=table table-bordered">

<tr>
<th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Status</th>
                    <th>Jam Absen</th>
                
                </tr>
         
                @foreach($jadwal as $idx => $j)
           
                <tr>
          
                <td> {{ $siswa->name }} </td>
                <td> {{ $siswa->kelas }} </td>
                <td>{{ $j->hari }}</td>
                <td>{{ $j->waktu_mulai }}</td>
                <td>{{ $j->waktu_akhir }}</td>
                <td>{{ $absen[$idx]->status ?? '' }}</td>
                <td>{{ $absen[$idx]->waktu_absen ?? '' }}</td>
            
                </tr>
@endforeach
</table>
</body