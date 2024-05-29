<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="-mt-10 mb-4">
                <input type="text" id="searchInput" placeholder="Search Users..."
                    class="w-full px-4 py-2 text-lg rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:border-blue-500 dark:focus:border-blue-300 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100"
                    oninput="searchUser()">
            </div>
            <div class="flex justify-between items-center mb-4">
                <div class="flex justify-between items-center">
                    <a href="{{ route('admin.users.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">Add
                        User</a>
                </div>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible bg-green-600 dark:bg-green-800 bg-opacity-50 text-white py-1 px-2 rounded-md text-sm"
                        role="alert" style="max-width: 300px;">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-success alert-dismissible bg-red-600 dark:bg-red-800 bg-opacity-50 text-white py-1 px-2 rounded-md text-sm"
                        role="alert" style="max-width: 300px;">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    User Type & Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Role
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody id="userTable"
                            class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Group 1 -->
                            <tr class="bg-gray-200 dark:bg-gray-700 group-header" data-group="admins">
                                <td colspan="4"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-gray-300 uppercase tracking-wider cursor-pointer">
                                    <i class="fas fa-chevron-down toggle-icon"></i>
                                    Admins : {{ count($admins) }}
                                </td>
                            </tr>
                            @foreach ($admins as $admin)
                                <tr class="user-row admins">
                                    <td
                                        class="flex justify-start items-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-300">
                                        <img class="w-8 h-8 rounded-full mr-2" src="{{ $admin->profile_photo_url }}"
                                            alt="{{ $admin->name }}">
                                        <span class="user-name">{{ $admin->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        <span class="user-email">{{ $admin->email }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ $admin->roles->name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        No Action Needed
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Group 2 -->
                            <tr class="bg-gray-200 dark:bg-gray-700 group-header" data-group="authors">
                                <td colspan="4"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-gray-300 uppercase tracking-wider cursor-pointer">
                                    <i class="fas fa-chevron-down toggle-icon"></i>
                                    Authors : {{ count($authors) }}
                                </td>
                            </tr>
                            @foreach ($authors as $author)
                                <tr class="user-row authors">
                                    <td
                                        class="flex justify-start items-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-300">
                                        <img class="w-8 h-8 rounded-full mr-2" src="{{ $author->profile_photo_url }}"
                                            alt="{{ $author->name }}">
                                        <span class="user-name">{{ $author->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        <span class="user-email">{{ $author->email }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ $author->roles->name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        <form class="inline-block delete-btn"
                                            action="{{ route('admin.users.destroy', $author->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure, you want to delete {{ $author->name }}?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Group 3 -->
                            <tr class="bg-gray-200 dark:bg-gray-700 group-header" data-group="users">
                                <td colspan="4"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-gray-300 uppercase tracking-wider cursor-pointer">
                                    <i class="fas fa-chevron-down toggle-icon"></i>
                                    Users : {{ count($users) }}
                                </td>
                            </tr>
                            @foreach ($users as $user)
                                <tr class="user-row users">
                                    <td
                                        class="flex justify-start items-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-300">
                                        <img class="w-8 h-8 rounded-full mr-2" src="{{ $user->profile_photo_url }}"
                                            alt="{{ $user->name }}">
                                        <span class="user-name">{{ $user->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        <span class="user-email">{{ $user->email }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ $user->roles->name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        <form class="inline-block delete-btn"
                                            action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure, you want to delete {{ $user->name }}?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <button id="backToTopBtn" onclick="scrollToTop()"
                class="fixed bottom-5 right-5 bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-md hidden"
                style="min-width: 44px; min-height: 44px;" aria-label="Back to Top" role="button">
                <i class="fas fa-arrow-up" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</x-app-layout>

