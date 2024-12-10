@extends('templates.admin-main')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Add New Blog</h1>
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-1 lg:grid-cols-1">
                <!-- Title -->
                <div>
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Enter title" required>
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

            
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-1 lg:grid-cols-1">
          

                <!-- Description -->
                <div>
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <input type="text" id="description" name="description" value="{{ old('description') }}"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Short description" required>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid gap-6 mb-6">
            
                <!-- File Upload -->
                <div>
                    <label for="file_input"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Upload Image</label>
                    <input id="file_input" type="file" name="image_url"
                        class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg cursor-pointer text-gray-900 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Accepted formats: SVG, PNG, JPG, GIF (max:
                        2MB).</p>
                    @error('image_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-4">
                <button type="submit"
                    class="px-5 py-2.5 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-500 dark:hover:bg-blue-600">
                    Submit
                </button>
                <a href="{{ route('admin.blog.index') }}">
                    <button type="button"
                        class="px-5 py-2.5 text-gray-900 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                        Cancel
                    </button>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
