@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card text-center">
    <h2>Selamat datang, {{ $username }}!</h2>
    <p>Silahkan klik menu yang ada di navbar untuk melanjutkan!</p>
</div>
@endsection
