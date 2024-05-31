<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-16">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Break Point To Start Type Cocde --}}
            <div class="-mt-10 mb-4 ">
                {{-- Search Post Desktop --}}
                <input type="text" id="searchInput" onkeyup="searchPosts()"
                    placeholder="Search By Title, Author, Campus, Or Category..."
                    class="hidden md:block w-full px-4 py-2 text-lg rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:border-blue-500 dark:focus:border-blue-300 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                {{-- Search Post Mobile --}}
                <input type="text" id="searchInputMobile" onkeyup="searchPosts()"
                    placeholder="Search By Title, Author, Campus, Or Category..."
                    class="block md:hidden w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:border-blue-500 dark:focus:border-blue-300 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
            </div>

            <div class="flex justify-between items-center mt-4">
                {{-- Add New Post --}}
                <div class="flex justify-between items-center">
                    <a href="{{ route('author.posts.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">Add
                        N Post</a>
                </div>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible bg-green-600 dark:bg-green-800 bg-opacity-50 text-white py-2 px-4 rounded-md text-sm"
                        role="alert" style="max-width: 300px;">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            {{-- Tampilan Posts --}}
            @foreach ($posts as $post)
                <article class="post py-8 max-w-screen-xl border-b border-gray-300 dark:border-gray-800 relative group">
                    <a href="{{ route('author.posts.show', $post['slug']) }}" class="hover:underline">
                        <h2 class="post-title mb-1 text-3xl tracking-tight font-bold text-gray-900 dark:text-gray-100">
                            {{ $loop->iteration }}. {{ $post['title'] }}</h2>
                    </a>
                    <div class="hidden md:block text-base text-gray-500 dark:text-gray-400">
                        {{-- Tampilan Desktop --}}
                        <a class="hover:underline"
                            href="#">{{ $post->author->name }}</a> |
                        {{ $post->created_at->format('F d, Y') }} | Updated {{ $post->updated_at->diffForHumans() }}
                    </div>
                    <div class="block md:hidden text-base text-gray-600 dark:text-gray-400">
                        {{-- Tampilan Mobile --}}
                        <a href="#">By : {{ $post->author->name }}</a>
                        <div>{{ $post->created_at->format('F d, Y') }} | Updated
                            {{ $post->updated_at->diffForHumans() }}</div>
                    </div>
                    <div class="mb-4" tabindex="0">
                        <a href="{{ route('author.posts.show-category', $post->categories->slug) }}"
                            class="bg-orange-600 dark:bg-orange-500 text-white text-sm px-2 py-1 rounded hover:underline hover:bg-orange-800">{{ $post->categories->name }}</a>
                        <a href="{{ route('author.posts.show-campus', $post->campus->slug) }}"
                            class="bg-blue-600 dark:bg-blue-500 text-white text-sm px-2 py-1 rounded hover:underline hover:bg-blue-800">{{ $post->campus->name }}</a>
                    </div>
                    <p class="my-4 font-light text-gray-900 dark:text-gray-100">{{ Str::limit($post['body'], 50) }}</p>
                    <a href="{{ route('author.posts.show', $post['slug']) }}"
                        class="font-medium text-blue-500 dark:text-blue-300 hover:underline">Read More &raquo;</a>
                    <div
                        class="flex mt-2 absolute top-1/2 transform -translate-y-1/2 right-0 space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="{{ route('author.posts.edit', $post['slug']) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 dark:bg-yellow-600 dark:hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded edit-btn">Edit</a>
                        <form class="inline-block delete-btn" action="{{ route('author.posts.destroy', $post->slug) }}"
                            method="POST" onsubmit="return confirm('Are you sure want delete this Post?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </div>
                </article>
            @endforeach
            <button id="backToTopBtn" onclick="scrollToTop()"
                class="fixed bottom-5 right-5 bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-md hidden"
                style="min-width: 44px; min-height: 44px;" aria-label="Back to Top" role="button">
                <i class="fas fa-arrow-up" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</x-app-layout>
