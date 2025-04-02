<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Event Management') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Figtree', sans-serif;
        }

        header.navbar {
            background-color: #007BFF;
        }

        header.navbar a {
            color: #fff;
            text-decoration: none;
            margin-right: 15px;
            font-weight: 500;
        }

        .content-wrapper {
            max-width: 960px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        footer {
            text-align: center;
            font-size: 14px;
            color: #888;
            padding: 30px 0;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <header class="navbar navbar-expand-lg px-4 py-3 shadow-sm mb-4">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('home') }}">
                {{ config('app.name', 'Event Manager') }}
            </a>

            <nav class="ms-auto">
                <a href="{{ route('events.index') }}">📅 Events</a>
                <a href="{{ route('venues.index') }}">📍 Venues</a>
                <a href="{{ route('registrations.index') }}">📝 Registrations</a>
            </nav>
        </div>
    </header>

    <!-- Page Heading -->
    @isset($header)
        <div class="bg-white shadow-sm py-3 mb-4">
            <div class="container">
                {{ $header }}
            </div>
        </div>
    @endisset

    <!-- Page Content -->
    <main>
        <div class="content-wrapper">
            {{ $slot }}
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} Event Management
    </footer>

</body>
</html>
