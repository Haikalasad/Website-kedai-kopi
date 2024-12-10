@extends('templates.admin-main')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4  rounded-lg dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <input type="text" id="search" name="search" placeholder="Search..."
                    class="px-3 py-2 border border-gray-500 rounded-lg focus:outline-none focus:border-blue-500" />
                <button id="clearSearch" type="button"
                    class="ml-2 hidden text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                    Clear
                </button>
            </div>
            <a href="{{ route('admin.blog.create') }}">
                <button type="button"
                    class="text-gray-50 bg-[#b7292e] hover:bg-[#97151b] border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
                    Add Blog
                </button>
            </a>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-16 py-3"><span class="sr-only">Image</span></th>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody id="blogTable">
                    @foreach ($blogs as $blog)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">
                            <img src="{{ filter_var($blog->image_url, FILTER_VALIDATE_URL) ? $blog->image_url : asset('storage/' . $blog->image_url) }}"
                                class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $blog->name }}">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $blog->title }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $blog->description }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.blog.edit', $blog->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" class="inline-block">
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
    const blogTable = document.getElementById('blogTable');
    const clearButton = document.getElementById('clearSearch');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value;

        if (query.length > 0) {
            clearButton.classList.remove('hidden');
        } else {
            clearButton.classList.add('hidden');
        }

        fetch(`{{ route('admin.blog.search') }}?search=${query}`)
            .then(response => response.json())
            .then(blogs => {
                blogTable.innerHTML = ''; // Hapus data lama
                if (blogs.length > 0) {
                    blogs.forEach(blog => {
                        blogTable.innerHTML += `
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="p-4">
                                    <img src="${blog.image_url.startsWith('http') ? blog.image_url : '/storage/' + blog.image_url}" class="w-16 md:w-32 max-w-full max-h-full" alt="${blog.title}">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    ${blog.title}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    ${blog.description}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/admin/blog/${blog.id}/edit" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    <form action="/admin/blog/${blog.id}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>`;
                    });
                } else {
                    blogTable.innerHTML = `
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
        searchInput.dispatchEvent(new Event('input')); // Trigger pencarian kosong
    });
</script>


@endsection