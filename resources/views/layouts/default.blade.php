<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Define custom CSS class -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div
        class="relative min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="flex justify-between max-w-screen-xl mx-auto bg-slate-200">
            <div class="bg-slate-200 p-6 text-right z-10">
                <a href="{{ url('/permissions') }}" class="nav-link">Permissions</a>
                <a href="{{ url('/roles') }}" class="ml-4 nav-link">Roles</a>
                <a href="{{ url('/users') }}" class="ml-4 nav-link">Users</a>
            </div>
            @if (Route::has('login'))
            <div class="bg-slate-200 p-6 text-right z-10">
                @auth
                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 nav-link">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>



        <main class="max-w-screen-xl mx-auto">
            @yield('content')
        </main>
    </div>
</body>

</html>
