<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="-mt-10 mb-4">
                {{-- Search Post Desktop --}}
                <input type="text" id="searchInput" onkeyup="searchPosts()"
                    placeholder="Search By Title, Author, Campus, Or Category..."
                    class="hidden md:block w-full px-4 py-2 text-lg rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:border-blue-500 dark:focus:border-blue-300 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                {{-- Search Post Mobile --}}
                <input type="text" id="searchInputMobile" onkeyup="searchPosts()"
                    placeholder="Search By Title, Author, Campus, Or Category..."
                    class="block md:hidden w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:border-blue-500 dark:focus:border-blue-300 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
            </div>

            {{-- Tampilan Posts --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <article class="post bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                        {{-- Dummy Image from Unsplash If Image Not Exist --}}
                        @if ($post['image_path'])
                        <a href="{{ route('user.articles.show', $post['slug']) }}" class="block hover:opacity-80 hover:underline">
                            <img src="{{ asset('storage/' . $post['image_path']) }}"
                                alt="{{ $post['title'] }}" class="w-full h-48 object-cover">
                        </a>
                        @else
                        <a href="{{ route('user.articles.show', $post['slug']) }}" class="block hover:opacity-80 hover:underline">
                            <img src="https://images.unsplash.com/photo-1474511320723-9a56873867b5"
                                alt="{{ $post['title'] }}" class="w-full h-48 object-cover">
                        </a>
                        @endif
                        <a href="{{ route('user.articles.show', $post['slug']) }}" class="block hover:opacity-80 hover:underline p-4">
                            <h2
                                class="post-title mb-1 text-xl tracking-tight font-bold text-gray-900 dark:text-gray-100">
                                {{ $loop->iteration }}. {{ Str::limit($post['title'], 10) }}
                            </h2>
                        </a>
                        <div class="px-4 pb-4">
                            <div class="text-base text-gray-500 dark:text-gray-400 mb-2">
                                <a class="hover:underline"
                                    href="{{ route('user.articles.show-author', $post->author->slug) }}">{{ $post->author->name }}</a> |
                                {{ $post->created_at->format('F d, Y') }} | Updated
                                {{ $post->updated_at->diffForHumans() }}
                            </div>
                            <div class="mb-4" tabindex="0">
                                <a href="{{ route('user.articles.show-category', $post->categories->slug) }}"
                                    class="bg-orange-600 dark:bg-orange-500 text-white text-sm px-2 py-1 rounded hover:underline hover:bg-orange-800">{{ $post->categories->name }}</a>
                                <a href="{{ route('user.articles.show-campus', $post->campus->slug) }}"
                                    class="bg-blue-600 dark:bg-blue-500 text-white text-sm px-2 py-1 rounded hover:underline hover:bg-blue-800">{{ $post->campus->name }}</a>
                            </div>
                            <p class="my-4 font-light text-gray-900 dark:text-gray-100">
                                {{ Str::limit($post['body'], 40) }}</p>
                        </div>
                        <a href="{{ route('user.articles.show', $post['slug']) }}"
                            class="ml-4 -mb-20 font-medium text-blue-500 dark:text-blue-300 hover:underline">Read More
                            &raquo;</a>
                    </article>
                @endforeach
            </div>

            <button id="backToTopBtn" onclick="scrollToTop()"
                class="fixed bottom-5 right-5 bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-md hidden"
                style="min-width: 44px; min-height: 44px;" aria-label="Back to Top" role="button">
                <i class="fas fa-arrow-up" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</x-app-layout>
