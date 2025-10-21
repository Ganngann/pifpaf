<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
        <header class="w-full bg-white dark:bg-gray-800 shadow-md">
            <div class="container mx-auto flex justify-between items-center p-4">
                <a href="/" class="text-xl font-bold">{{ config('app.name', 'Laravel') }}</a>
                <nav class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </header>

        <div class="container mx-auto mt-8">
            <main class="w-full">
                <h2 class="text-2xl font-bold mb-6">Dernières Annonces</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @isset($latestAds)
                        @foreach ($latestAds as $ad)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                                <a href="{{ route('ads.show', $ad) }}">
                                    @if ($ad->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $ad->images->first()->image_path) }}" alt="{{ $ad->title }}" class="w-full h-48 object-cover">
                                    @else
                                        <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="text-gray-500 dark:text-gray-400">No Image</span>
                                        </div>
                                    @endif
                                    <div class="p-4">
                                        <h3 class="font-bold">{{ $ad->title }}</h3>
                                        <p class="text-gray-600 dark:text-gray-400">{{ number_format($ad->price, 2) }} €</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </main>
        </div>
    </body>
</html>
