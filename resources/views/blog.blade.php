@extends('templates.main') 

@section('content')
<section>
    <div class="max-w-screen-xl px-4 py-20 mx-auto lg:py-24 lg:px-6 text-start">
        <!-- Introductory Text -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 ">Blog Terbaru Kami</h2>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                Temukan informasi menarik seputar dunia kopi, tips penyajian, dan berbagai rekomendasi minuman terbaik kami di bawah ini.
            </p>
        </div>

        <!-- Blog List -->
        <div class="space-y-8">
            @foreach ($blogs as $blog)
                <div class="flex flex-col lg:flex-row items-center bg-white border border-gray-200 rounded-lg shadow ">
                    <!-- Image on the left with smaller size -->
                    <a href="#" class="w-full lg:w-1/4">
                        <img src="{{ filter_var($blog->image_url, FILTER_VALIDATE_URL) ? $blog->image_url : asset('storage/' . $blog->image_url) }}"
                                class="rounded-lg lg:rounded-none lg:rounded-l-lg w-full h-48 object-cover"
                                alt="{{ $blog->name }}">
                    </a>
                    
                    <!-- Text content on the right -->
                    <div class="p-5 w-full lg:w-3/4">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ $blog->title }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">{{ $blog->description }}</p>
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#b7292e] rounded-lg hover:bg-[#97151b] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <p>Show more</p>
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
