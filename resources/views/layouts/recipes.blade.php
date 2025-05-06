@extends('layouts.app')

@section('title', 'Resep Saya')

@section('content')
<div class="card">
    <h2 class="text-center">Daftar Resep Pribadi</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('recipes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Resep</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ingredients">Bahan-bahan</label>
            <textarea name="ingredients" id="ingredients" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="steps">Langkah-langkah</label>
            <textarea name="steps" id="steps" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" name="category" id="category" class="form-control" required>
        </div>

        <div class="text-center" style="margin-top: 15px;">
            <button type="submit" class="btn btn-primary">Simpan Resep</button>
        </div>
    </form>

    <hr>

    <h3 class="text-center">Resep Tersimpan</h3>

    @if(count($recipes) > 0)
        @foreach($recipes as $recipe)
            <div class="card" style="margin-top: 15px;">
                <h4>{{ $recipe['name'] }} <small style="font-size: 14px; color: #777;">({{ $recipe['category'] }})</small></h4>
                <p><strong>Bahan:</strong><br>{{ $recipe['ingredients'] }}</p>
                <p><strong>Langkah:</strong><br>{{ $recipe['steps'] }}</p>
                <form action="{{ route('recipes.destroy', $recipe['id']) }}" method="POST" style="text-align: right;" onsubmit="return confirm('Hapus resep ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </div>
        @endforeach
    @else
        <p class="text-center">Belum ada resep yang disimpan.</p>
    @endif

    <div class="text-center" style="margin-top: 20px;">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    </div>
</div>
@endsection
