<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-16">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('author.posts.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto mt-6">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Title:</label>
                    @error('title')
                        <p class="text-sm text-red-600 dark:text-red-400 alert-dismissible">{{ $message }}</p>
                    @enderror
                    <input type="text" id="title" name="title"
                    value="{{ old('title', '') }}" class="form-input w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-2 focus:outline-none focus:border-blue-500 dark:focus:border-blue-300 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                </div>
                <div class="mb-4">
                    <label for="campus_id" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Campus:</label>
                    @error('campus_id')
                    <p class="text-sm text-red-600 dark:text-red-400 alert-dismissible">{{ $message }}</p>
                    @enderror
                    <select id="campus_id" name="campus_id"
                    class="form-select w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-2 focus:outline-none focus:border-blue-500 dark:focus:border-blue-300 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        <option selected value="">Select Campus From</option>
                        @foreach ($campus as $campus)
                        <option value="{{ $campus->id }}"{{ old('campus_id', '') == $campus->id ? 'selected' : null }}>{{ $campus->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="categories_id" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Category:</label>
                    @error('categories_id')
                    <p class="text-sm text-red-600 dark:text-red-400 alert-dismissible">{{ $message }}</p>
                    @enderror
                    <select id="categories_id" name="categories_id"
                    class="form-select w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-2 focus:outline-none focus:border-blue-500 dark:focus:border-blue-300 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                        <option selected value="">Select Category Post</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"{{ old('categories_id', '') == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="body" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Body:</label>
                    @error('body')
                        <p class="text-sm text-red-600 dark:text-red-400 alert-dismissible">{{ $message }}</p>
                    @enderror
                    <textarea id="body" name="body" rows="5"
                    class="form-textarea w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-2 focus:outline-none focus:border-blue-500 dark:focus:border-blue-300 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">{{ old('body', '') }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="image_path" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Image:</label>
                    @error('image_path')
                        <p class="text-sm text-red-600 dark:text-red-400 alert-dismissible">{{ $message }}</p>
                    @enderror
                    <input type="file" id="image_path" name="image_path"
                    class="form-input w-full border border-gray-300 dark:border-gray-600 rounded px-4 py-2 focus:outline-none focus:border-blue-500 dark:focus:border-blue-300 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" onchange="previewImage(event)">
                </div>

                <div class="mb-4">
                    <label for="image_preview" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Preview Image:</label>
                    <img id="image_preview" src="#" alt="Image Preview" class="w-60 h-auto rounded-lg border-4 border-red-600 {{ old('image_path') ? '' : 'hidden' }}">
                </div>
                <div class="mb-4 flex justify-between items-center">
                    <a href="{{ route('author.posts.index') }}" class="block mt-4 text-gray-600 dark:text-gray-400 hover:underline">Back to Posts</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Post</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

