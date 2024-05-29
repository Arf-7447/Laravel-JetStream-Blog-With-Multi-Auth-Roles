<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Browse Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col items-left justify-center h-screen -mt-20 bg-gray-100 dark:bg-gray-900 dark:text-white">
                <h1 class="text-bold text-xl mb-2 font-madimi">This Is The Blog Page For User</h1>
                <h2 class="text-bold text-lg mb-2 font-madimi">Your Role Is <span class="text-red-600">{{ auth()->user()->roles->name }}</span></h2>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
