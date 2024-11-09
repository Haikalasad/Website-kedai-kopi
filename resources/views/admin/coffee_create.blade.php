@extends('templates.admin-main')

@section('content')
<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">
    <div class="p-6 border border-gray-300 rounded-lg shadow-lg bg-white max-w-2xl mx-auto">
        <form action="{{ route('admin.coffee.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="font-semibold text-2xl text-gray-800 mb-6">Add New Coffee</h1>
            
            <div class="grid gap-4 mb-6">
                <!-- Nama -->
                <div>
                    <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                        placeholder="Type here" required />
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block mb-1 text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}"
                        class="bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                        placeholder="Rp 0" required />
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block mb-1 text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description"
                        class="bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                        placeholder="Deskripsi" required>{{ old('description') }}</textarea>
                </div>

                <!-- File Upload -->
                <div>
                    <label for="file_input" class="block mb-1 text-sm font-medium text-gray-700">Upload file</label>
                    <input type="file" id="file_input" name="image_url"
                        class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none">
                    <p class="mt-1 text-xs text-gray-500">Supported formats: SVG, PNG, JPG, GIF (MAX. 800x400px).</p>
                </div>
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="flex space-x-4">
                <button type="submit"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5">Submit</button>
                
                <a href="{{ route('admin.coffee.index') }}"
                    class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-6 py-2.5">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
