<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Not Found!</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full font-body">
    <main class="relative isolate min-h-full">
        <img src="{{ URL('images/404.jpg') }}" alt="Warehouse"
            class="absolute inset-0 -z-10 h-full w-full object-cover object-top brightness-[0.25]">
        <div class="mx-auto max-w-7xl px-6 py-32 text-center sm:py-40 lg:px-8">
            <p class="text-base font-semibold leading-8 text-white">404 - Lost in Creativity</p>
            <h1 class="mt-4 text-3xl font-handcrafted tracking-tight text-white sm:text-5xl">Oops, This Page is Still
                Being Crafted</h1>
            <p class="mt-4 text-base text-white/70 sm:mt-6">Seems like you've found a page that's still under the
                artisan's touch. Let's get you back to the marketplace.</p>
            <div class="mt-10 flex justify-center">
                <a href="/" class="text-xl font-bold leading-7 text-white"><span aria-hidden="true">&#8592;</span>
                    Back to home</a>
            </div>
        </div>
    </main>
</body>

</html>
