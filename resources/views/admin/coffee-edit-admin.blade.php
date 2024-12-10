@extends('templates.admin-main')

@section('content')
<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">
<div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
        <form action="{{ route('admin.coffee.update', $coffee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1 class="font-semibold text-2xl text-gray-800 dark:text-white  mb-6">Edit Coffee</h1>

            <div class="mb-6">

                <img src="{{ filter_var($coffee->image_url, FILTER_VALIDATE_URL) ? $coffee->image_url : asset('storage/' . $coffee->image_url) }}" 
                    class="w-80 md:w-80 max-w-full max-h-full" 
                    alt="{{ $coffee->name }}">

            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Nama -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium  text-gray-800 dark:text-white">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $coffee->name) }}"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Type the coffee name" required />
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $coffee->price) }}"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Rp 0" required />
                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-6">
                <!-- Description -->
                <label for="description" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Enter a description for the coffee" required>{{ old('description', $coffee->description) }}</textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <!-- File Upload -->
                <label for="file_input" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">Upload New Image</label>
                <input type="file" id="file_input" name="image_url"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <p class="mt-1 text-xs text-gray-500">Supported formats: SVG, PNG, JPG, GIF (max size: 2MB).</p>
                @error('image_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="flex space-x-4">
                <button type="submit"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-2.5">
                    Save Changes
                </button>
                <a href="{{ route('admin.coffee.index') }}"
                    class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-6 py-2.5">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
