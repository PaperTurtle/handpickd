<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Handpickd</title>
    <link rel="icon" type="image/x-icon" href="{{ URL('images/favicon.ico') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ URL::asset('js/backToTopButton.js') }}" defer></script>
</head>

<body class="font-body bg-background">
    <div class="min-h-screen">
        @include('layouts.navigation')
        <main class="min-h-screen">
            @if (session('error'))
                <x-error-notification>
                    {{ session('error') }}
                </x-error-notification>
            @endif
            {{ $slot }}
        </main>
        <x-back-to-top-btn />
        @include('layouts.footer')
    </div>
</body>

</html>
