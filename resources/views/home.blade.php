<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('images/company.png') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 bg-cover bg-center">
    <img id="background" class="absolute inset-0 w-full h-full object-cover"
        src="{{ asset('images/senko-wp-basic-no-wm.jpg') }}" alt="Background Image">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <form class=" bg-white bg-opacity-80 dark:bg-slate-600 dark:bg-opacity-80 grid grid-cols-1 sm:grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3 border-4 border-teal-600 dark:border-white rounded-lg p-6">
                    <div class="flex flex-col sm:flex-row items-center justify-center sm:justify-start">
                        <a href="{{ route('dashboard') }}" class="hover:opacity-80">
                            {{-- <img class="h-20 w-auto rounded-3xl border-4 border-teal-600 dark:border-white"
                            src="{{ asset('images/company.png') }}" alt="Ivanov Insights"> --}}
                            <x-application-logo class="h-20 w-auto rounded-3xl border-4 border-teal-600 dark:border-white"/>
                        </a>
                        <div class="flex flex-col items-center sm:items-start sm:ml-4 mt-2 sm:mt-0">
                            <h1 class="text-3xl font-bold italic text-teal-600 dark:text-white font-madimi">Ivanov
                                Insights</h1>
                            <p class="text-center sm:text-left">Explore Your Ideas & Creativity</p>
                        </div>
                    </div>

                    {{-- Dekstop View --}}
                    <div class="hidden sm:block">@if (Route::has('login'))
                        <div class="absolute right-20 top-[40%] flex justify-center items-center">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 bg-teal-600 text-white ring-1 ring-transparent transition hover:bg-teal-800 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Dashboard
                                </a>
                            @else
                                <div class="flex space-x-2">
                                    <a href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 bg-teal-600 text-white ring-1 ring-transparent transition hover:bg-teal-800 focus:outline-none focus-visible:ring-[#FF2D20]">
                                        Log in
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 bg-teal-600 text-white ring-1 ring-transparent transition hover:bg-teal-800 focus:outline-none focus-visible:ring-[#FF2D20]">
                                            Register
                                        </a>
                                    @endif
                                </div>
                            @endauth
                        </div>
                    @endif
                    </div>

                    {{-- Mobile View --}}
                    <div class="block sm:hidden">
                        @if (Route::has('login'))
                            <div class="-mx-3 flex flex-1 justify-center sm:justify-end mt-4 sm:mt-0">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 bg-teal-600 text-white ring-1 ring-transparent transition hover:bg-teal-800 focus:outline-none focus-visible:ring-[#FF2D20]">
                                        Dashboard
                                    </a>
                                @else
                                    <div class="flex space-x-2">
                                        <a href="{{ route('login') }}"
                                            class="rounded-md px-3 py-2 bg-teal-600 text-white ring-1 ring-transparent transition hover:bg-teal-800 focus:outline-none focus-visible:ring-[#FF2D20]">
                                            Log in
                                        </a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="rounded-md px-3 py-2 bg-teal-600 text-white ring-1 ring-transparent transition hover:bg-teal-800 focus:outline-none focus-visible:ring-[#FF2D20]">
                                                Register
                                            </a>
                                        @endif
                                    </div>
                                @endauth
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
