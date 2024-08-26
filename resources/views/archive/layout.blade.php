<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '38D Al-loli')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>38D Al-loli</h1>
            <nav>
                <a href="{{ route('users.index') }}" class="nav-link">Users</a>
                <a href="{{ route('users.create') }}" class="nav-link">Create User</a>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} 38d Al-Loli. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
