<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-16">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <!-- Content Section -->
                <div class="mb-4">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100" tabindex="0">
                        {{ $post->title }}</h1>
                    <div class="hidden md:block text-sm text-gray-600 dark:text-gray-400">
                        {{-- Tampilan Desktop --}}
                        <a class="hover:underline"
                            href="{{ route('user.favorites.show-author', $post->author->slug) }}">By
                            {{ $post->author->name }}</a> |
                        {{ $post->created_at->format('F d, Y') }} | Updated {{ $post->updated_at->diffForHumans() }}
                    </div>
                    <div class="block md:hidden text-sm text-gray-600 dark:text-gray-400">
                        {{-- Tampilan Mobile --}}
                        <a href="{{ route('user.favorites.show-author', $post->author->slug) }}"
                            class="hover:underline">By {{ $post->author->name }}</a>
                        <div>{{ $post->created_at->format('F d, Y') }} | Updated
                            {{ $post->updated_at->diffForHumans() }}</div>
                    </div>
                </div>
                <div class="mb-4" tabindex="0">
                    <span
                        class="bg-orange-600 dark:bg-orange-500 text-white text-sm px-2 py-1 rounded">{{ $post->categories->name }}</span>
                    <span
                        class="bg-blue-600 dark:bg-blue-500 text-white text-sm px-2 py-1 rounded">{{ $post->campus->name }}</span>
                </div>
                <!-- Image and Content Section -->
                <div class="prose max-w-none text-justify text-gray-900 dark:text-gray-200" tabindex="0">
                    @if ($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                            class="rounded-lg shadow-md object-cover w-full h-54 md:float-left md:w-1/3 md:mr-6 mb-4">
                    @else
                        <img src="https://images.unsplash.com/photo-1474511320723-9a56873867b5"
                            alt="{{ $post->title }}"
                            class="rounded-lg shadow-md object-cover w-full h-54 md:float-left md:w-1/3 md:mr-6 mb-4">
                    @endif
                    {!! nl2br(e($post->body)) !!}
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('user.favorites.index') }}"
                        class="text-blue-500 dark:text-blue-300 hover:underline">&laquo; Back to Posts</a>
                    @if ($liked)
                        <a href="unlike/{{ $post->slug }}"
                            class="text-red-500 dark:text-red-300 hover:underline">
                            <i class="fa-solid fa-star"></i> {{ $like }}
                        </a>
                    @else
                        <a href="like/{{ $post->slug }}"
                            class="text-red-500 dark:text-red-300 hover:underline">
                            <i class="fa-regular fa-star"></i> {{ $like }}
                        </a>
                    @endif

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
