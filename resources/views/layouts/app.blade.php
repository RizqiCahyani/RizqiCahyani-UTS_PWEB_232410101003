<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            color: #333;
            margin: 0;
            padding-bottom: 60px;
            position: relative;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .main-wrapper {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .navbar {
            background-color: #2c3e50;
            color: white;
            padding: 10px 0;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin-left: 20px;
        }

        .nav-link {
            color: #ecf0f1;
            text-decoration: none;
        }

        .nav-link:hover {
            color: #1098f2;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #8ec4e8;
        }

        .btn-danger {
            background-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #ea7e72;
        }

        .text-center {
            text-align: center;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            color: white;
            text-align: center;
            padding: 20px 0;
            box-sizing: border-box;
            z-index: 1000;
        }

        @yield('styles')
    </style>
</head>
<body class="{{ request()->routeIs('login.form') ? 'main-wrapper' : '' }}">
    @if (! request()->routeIs('login.form'))
        @include('components.navbar')
    @endif

    <div class="container">
        @yield('content')
    </div>

    @include('components.footer')

    @yield('scripts')
</body>
</html>
