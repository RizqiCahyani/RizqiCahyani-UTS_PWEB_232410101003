<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Pengelolaan Resepku</a>
        <ul class="navbar-nav">
            @if (session()->has('username'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recipes') }}">Recipes</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer;">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.form') }}">Login</a>
                </li>
            </ul>
            @endif
    </div>
</nav>
