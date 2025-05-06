@extends('layouts.app')

@section('title', 'Pengelolaan Resep')

@section('content')
<div style="text-align: center;">
    <h1>Daftar Resep</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <p><a href="{{ route('recipes.create') }}" class="btn btn-primary">Tambah Resep Baru</a></p>

    @if (count($recipes) > 0)
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; margin: 0 auto; max-width: 1200px;">
            @foreach ($recipes as $recipe)
                <div style="margin: 10px; text-align: center; transition: transform 0.3s;">
                    <img src="{{ asset('storage/' . ($recipe['image'] ?? 'default.jpg')) }}"
                         alt="{{ $recipe['name'] }}"
                         style="width: 200px; height: 150px; object-fit: cover; border-radius: 8px; cursor: pointer; box-shadow: 0 4px 8px rgba(0,0,0,0.1);"
                         onclick='showDetail(@json($recipe))'>
                    <p style="margin-top: 10px; font-weight: 600;">{{ $recipe['name'] }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>Belum ada resep yang ditambahkan.</p>
    @endif
</div>

<div id="recipeDetail" style="display:none; position:fixed; top:10%; left:50%; transform:translateX(-50%);
    background:#fff; padding:20px; border:1px solid #ccc; z-index:999; width:400px;">
    <h2 id="detailName"></h2>
    <p><strong>Kategori:</strong> <span id="detailCategory"></span></p>
    <p><strong>Bahan:</strong> <span id="detailIngredients"></span></p>
    <p><strong>Langkah:</strong> <span id="detailSteps"></span></p>

    <form id="deleteForm" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Hapus</button>
    </form>
    <button onclick="closeDetail()" class="btn btn-primary mt-2">Tutup</button>
</div>
@endsection

@section('styles')
<style>
    div:hover {
        transform: scale(1.05);
    }
    img:hover {
        opacity: 0.9;
    }
</style>
@endsection

@section('scripts')
<script>
    function showDetail(recipe) {
        document.getElementById('detailName').textContent = recipe.name;
        document.getElementById('detailCategory').textContent = recipe.category;
        document.getElementById('detailIngredients').textContent = recipe.ingredients;
        document.getElementById('detailSteps').textContent = recipe.steps;
        document.getElementById('deleteForm').action = '/recipes/' + recipe.id;
        document.getElementById('recipeDetail').style.display = 'block';
    }

    function closeDetail() {
        document.getElementById('recipeDetail').style.display = 'none';
    }
</script>
@endsection
