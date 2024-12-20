@extends('templates.admin-main')

@section('content')
<div class="p-4 sm:ml-64">
    <div class=" border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <input type="text" id="search" name="search" placeholder="Search..."
                    class="px-3 py-2 border border-gray-500 rounded-lg focus:outline-none focus:border-blue-500" />
                <button id="clearSearch" type="button"
                    class="ml-2 hidden text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                    Clear
                </button>
            </div>
            <a href="{{ route('admin.coffee.create') }}">
                <button type="button"
                    class="text-gray-50 bg-[#b7292e] hover:bg-[#97151b] border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
                    Add Coffee
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
                <tbody id="coffeeTable">
                    @foreach ($coffees as $coffee)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">
                            <img src="{{ filter_var($coffee->image_url, FILTER_VALIDATE_URL) ? $coffee->image_url : asset('storage/' . $coffee->image_url) }}"
                                class="w-16 md:w-32 max-w-full max-h-full"
                                alt="{{ $coffee->name }}">

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


<script>
    const searchInput = document.getElementById('search');
    const coffeeTable = document.getElementById('coffeeTable');
    const clearButton = document.getElementById('clearSearch');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value;

        if (query.length > 0) {
            clearButton.classList.remove('hidden');
        } else {
            clearButton.classList.add('hidden');
        }

        fetch(`{{ route('admin.coffee.search') }}?search=${query}`)
            .then(response => response.json())
            .then(coffees => {
                coffeeTable.innerHTML = ''; 
                if (coffees.length > 0) {
                    coffees.forEach(coffee => {
                        coffeeTable.innerHTML += `
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="p-4">
                                    <img src="${coffee.image_url.startsWith('http') ? coffee.image_url : '/storage/' + coffee.image_url}"
                                        class="w-16 md:w-32 max-w-full max-h-full" alt="${coffee.name}">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">${coffee.name}</td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">${coffee.description}</td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">${coffee.price}</td>
                                <td class="px-6 py-4">
                                    <a href="/admin/coffee/${coffee.id}/edit" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    <form action="/admin/coffee/${coffee.id}" method="POST" class="inline">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>`;
                    });

                } else {
                    coffeeTable.innerHTML = `
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No results found
                            </td>
                        </tr>`;
                }
            });
    });

    clearButton.addEventListener('click', function() {
        searchInput.value = '';
        clearButton.classList.add('hidden');
        searchInput.dispatchEvent(new Event('input'));
    });
</script>
@endsection