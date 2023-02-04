<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tavo magiškiems nuotykiams!</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Icons -->
    <link href="/node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/front/app.css','resources/js/front/app.js'])
</head>

<body>
    @include('layouts.nav-front')

        <!-- Page Heading -->
        @if (isset($header))
            <header>
                <div>
                    {{ $header }}
                </div>
            </header> @endif

        <!-- Page Content -->
        <main>
             {{ $slot }}
        </main>
</body>
</html>
