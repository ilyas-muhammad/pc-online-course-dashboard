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
    <h5> Data Siswa<h4>
    </center>

    

<table border="1.5" class=table table-bordered">

<tr>

    <th> Nama Siswa </th>
    <th> Email </th>
    <th> Kelas </th>
    <th> Jenis Kelamin </th>
    <th> Status </th>
</tr>
@foreach($siswa as $s)

<tr> 
                  <td> {{ $s-> name}}</td>
                  <td> {{ $s-> email }}</td>
                  <td> {{ $s-> kelas }}</td>
                  <td> {{ $s-> jenkel }}</td>
                  <td> {{ $s-> status }}</td>
   
</tr>
@endforeach
</table>
</body>
    

