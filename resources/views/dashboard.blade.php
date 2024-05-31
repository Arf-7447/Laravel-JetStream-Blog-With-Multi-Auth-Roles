<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-16">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col items-center justify-center h-screen -mt-20 bg-gray-100 dark:bg-gray-900 dark:text-white">
                {{-- <x-welcome /> --}}
                <img src="{{ asset('images/senko.gif') }}" alt="welcome image"
                class="bg-red-600 rounded-2xl border-4 border-red-600 border-dotted mb-4 " width="256"height="256">
                {{-- Contoh menggunakan font dengan Tailwind Class --}}
                <h1 class="text-bold text-xl mb-2 font-madimi">! This Is Ivanov Insights !</h1>
                @if (auth()->user()->role_id == 1)
                <h2 class="text-bold text-lg mb-2 font-madimi">- Welcome <span class="text-red-600">{{ auth()->user()->name }}</span> ! -</h2>
                @elseif(auth()->user()->role_id == 2)
                <h2 class="text-bold text-lg mb-2 font-madimi">- Welcome <span class="text-orange-600">{{ auth()->user()->name }}</span> ! -</h2>
                @elseif(auth()->user()->role_id == 3)
                <h2 class="text-bold text-lg mb-2 font-madimi">- Welcome <span class="text-pink-600">{{ auth()->user()->name }}</span> ! -</h2>
                @endif
                {{-- Contoh menggunakan font dengan Inline Styles --}}
                <h3 class="text-base" style="font-family: 'Madimi One', sans-serif;">- We're Here, Learning Basic CRUD -</h3>
                <p>- Laravel 11, JetStream 5 & TailwindCss -</p>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
