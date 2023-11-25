<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Handpickd</title>
    <link rel="icon" type="image/x-icon" href="{{ URL('images/favicon.ico') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-body bg-background">
    <div class="min-h-screen">
        @include('layouts.navigation')
        <main class="min-h-screen">
            {{ $slot }}
        </main>
        @include('layouts.footer')
    </div>
</body>

</html>
