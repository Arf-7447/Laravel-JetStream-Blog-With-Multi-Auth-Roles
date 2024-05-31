<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-16">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Break Point To Start Type Cocde --}}
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mt-4 relative">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <button type="button" onclick="togglePassword('password')" class="mt-6 absolute inset-y-0 right-0 px-3 py-2 text-gray-600 dark:text-gray-400 focus:outline-none">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>

                <div class="mt-4 relative">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <button type="button" onclick="togglePassword('password_confirmation')" class="mt-6 absolute inset-y-0 right-0 px-3 py-2 text-gray-600 dark:text-gray-400 focus:outline-none">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>

                <div class="mt-4 relative ">
                    <x-label for="role_id" class="block text-gray-700 text-sm font-bold mb-2" value="{{ __('Register as:') }}" />
                    <select name="role_id" x-model="role_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none  focus:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                        <option selected class="text-sm">Select User Role</option>
                        <option value="1" class="text-sm">Admin</option>
                        <option value="2" class="text-sm">Author</option>
                        <option value="3" class="text-sm">User</option>
                    </select>
                </div>

                <div class="mb-4 mt-4 flex justify-between items-center">
                    <a href="{{ route('admin.users.index') }}" class="block ml-2 text-gray-600 dark:text-gray-400 hover:underline">Back to Users</a>
                    <x-button class="ms-4 mr-2">
                        {{ __('Register This User') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
