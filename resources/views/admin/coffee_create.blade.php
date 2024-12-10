@extends('templates.admin-main')

@section('content')
<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">
<div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
        <form action="{{ route('admin.coffee.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="font-semibold text-2xl text-gray-800 dark:text-white mb-6">Add New Coffee</h1>
            
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Nama -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white w-full p-3"
                        placeholder="Type the coffee name" required />
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium  text-gray-700 dark:text-gray-300">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white w-full p-3"
                        placeholder="Rp 0" required />
                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-6">
                <!-- Description -->
                <label for="description" class="block mb-2 text-sm font-medium  text-gray-700 dark:text-gray-300">Description</label>
                <textarea id="description" name="description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  w-full p-3"
                    placeholder="Enter a description for the coffee" required>{{ old('description') }}</textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <!-- File Upload -->
                <label for="file_input" class="block mb-2 text-sm font-medium  text-gray-700 dark:text-gray-300">Upload Image</label>
                <input type="file" id="file_input" name="image_url"
                    class="block w-full text-sm text-gray-300 border border-gray-300 rounded-lg cursor-pointer bg-gray-700 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <p class="mt-1 text-xs text-gray-500">Supported formats: SVG, PNG, JPG, GIF (max size: 800x400px).</p>
                @error('image_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="flex space-x-4">
                <button type="submit"
                    class="text-white bg-[#b7292e] hover:bg-[#97151b] font-medium rounded-lg text-sm px-6 py-2.5">
                    Submit
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
