@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="card">
    <h2>Profil Pengguna</h2>

    <div class="profile-info">
        <p><strong>Username:</strong> {{ $username }}</p>
        <p><strong>Status:</strong> Active</p>
        <p><strong>Role:</strong> User</p>
    </div>

    <div class="text-center" style="margin-top: 20px;">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    </div>
</div>
@endsection
