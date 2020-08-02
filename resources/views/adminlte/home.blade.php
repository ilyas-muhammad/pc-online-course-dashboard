@extends('adminlte.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Status</h3>
    </div>
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{ __('Selamat Datang!') }}
    </div>
</div>
@endsection