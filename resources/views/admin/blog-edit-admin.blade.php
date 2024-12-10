@extends('templates.admin-main')

@section('content')
<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">
<div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
        <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h1 class="font-semibold text-2xl text-gray-800 dark:text-white mb-6">Edit Blog</h1>

            <!-- Current Image -->
            <div class="mb-6">
                <img src="{{ filter_var($blog->image_url, FILTER_VALIDATE_URL) ? $blog->image_url : asset('storage/' . $blog->image_url) }}" 
                    class="w-80 md:w-80 max-w-full max-h-full" 
                    alt="{{ $blog->name }}">
            </div>

            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white0">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Enter title" required />
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Description</label>
                <input type="text" id="description" name="description" value="{{ old('description', $blog->description) }}"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Enter description" required />
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Image Upload -->
            <div class="mb-6">
                <label for="file_input" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Upload New Image</label>
                <input type="file" id="file_input" name="image_url"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <p class="mt-1 text-xs text-gray-500">Accepted formats: JPG, PNG, GIF (Max size: 2MB).</p>
                @error('image_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Buttons -->
            <div class="flex space-x-4">
                <button type="submit"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-2.5">
                    Save Changes
                </button>
                <a href="{{ route('admin.blog.index') }}"
                    class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-6 py-2.5">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
