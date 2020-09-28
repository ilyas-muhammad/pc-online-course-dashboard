<!DOCTYPE html>
<html>
<head>


<title> Print Data Siswa</title>

</head>
<body>
<img src="/images/logo.jpg" class="mx-auto d-block"/>

<style type="text/css">
table tr td,
table tr th{
    font-size : 16pt;
}
</style>
<center>
    <h5> Data Siswa<h4>
    </center>

    

<table border="1.5">

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
    

