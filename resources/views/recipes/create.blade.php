@extends('layouts.app')

@section('title', 'Tambah Resep Baru')

@section('content')
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f4f8;
        }

    .recipe-container {
        max-width: 700px;
        margin: 40px auto;
        background-color: #ffffff;
        padding: 40px 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #34495e;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccd6dd;
            border-radius: 6px;
            font-size: 16px;
            background-color: #fafafa;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #219150;
        }

        .alert.alert-danger {
            background-color: #f8d7da;
            color: #842029;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            border: 1px solid #f5c2c7;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>

    <div class="container">
        <h1>Tambah Resep Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Nama Resep:</label>
            <input type="text" name="name" required>

            <label>Bahan:</label>
            <textarea name="ingredients" required></textarea>

            <label>Langkah-langkah:</label>
            <textarea name="steps" required></textarea>

            <label>Kategori:</label>
            <input type="text" name="category" required>

            <label>Gambar Resep:</label>
            <input type="file" name="image" accept="image/*">

            <button type="submit">Simpan</button>
        </form>
    </div>
@endsection
