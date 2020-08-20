@extends('auth.master')

{{-- Title --}}
@section('title', 'Step 2 - Register)


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

    <form action="/register2" method="POST">

    <div class="form-group">
</div>

div class="card-body">
        <table id="example1" class="table table-bordered table-hover projects">
            <thead>
                <tr>
                    <th style="width: 10%">
                        Nama Kelas
                    </th>
                    <th style="width: 10%">
                        Hari
                    </th>
                    <th style="width: 10%">
                        Ruangan
                    </th>
                    <th style="width: 10%">
                        Jam Mulai
                    </th>
                    <th style="width: 10%">
                        Jam Akhir
                    </th>
                    <th style="width: 20%">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($jadwal as $j)
                <tr>
                  <td> {{ $j-> nama_kelas}}</td>
                  <td> {{ $j-> hari }}</td>
                  <td> {{ $j-> ruang }}</td>
                  <td> {{ $j-> waktu_mulai }}</td>
                  <td> {{ $j-> waktu_akhir }}</td>
                  td class="project-actions text-right">
                
                        <a class="btn btn-info btn-sm" href="/{{$j->id}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Pilih
                        </a>
                        </td>
                </tr>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection