<!DOCTYPE html>
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

    <th> Nama Siswa </th>
    <th> Kelas </th>
    <th> Jenis Kelamin </th>
    <th> Skor </th>
</tr>
@foreach($nilai as $n)

<tr> 
    <td> {{ $n-> name}}</td>
    <td> {{ $n-> kelas}}</td>
    <td> {{ $n-> jenkel}}</td>
    <td> {{ $n-> skor}}</td>
    
   
</tr>
@endforeach
</table>
</body>
    

