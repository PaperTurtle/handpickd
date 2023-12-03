<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Handpickd') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm flex flex-col justify-center items-center">
            <x-application-logo class="w-12 h-12 text-gray-500" />
            @if (request()->routeIs('register'))
                <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create a new
                    Account
                </h2>
            @else
                <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                    Sign in to your account
                </h2>
            @endif
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
