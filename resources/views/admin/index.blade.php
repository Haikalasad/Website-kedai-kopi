@extends('templates.admin-main')

@section('content')
<div class="p-4 sm:ml-64">
    <div class=" border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
    <form action="{{ route('admin.coffee.index') }}" method="GET" class="flex items-center">
        <input type="text" name="search" placeholder="Search..." 
            class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" />
        <button type="submit"
            class="ml-2 text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
            Search
        </button>
    </form>
    
    <a href="{{ route('admin.coffee.create') }}">
        <button type="button"
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
            Add
        </button>
    </a>
</div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-16 py-3"><span class="sr-only">Image</span></th>
                        <th scope="col" class="px-6 py-3">Product</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coffees as $coffee)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                <img src="{{ asset( $coffee->image_url) }}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $coffee->name }}">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $coffee->name }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $coffee->description }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $coffee->price }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.coffee.edit', $coffee->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.coffee.destroy', $coffee->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
