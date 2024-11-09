@extends('templates.main')

@section('content')
<section>
    <div class="max-w-screen-xl px-4 pt-20 mx-auto lg:pt-24 lg:px-6 items-center text-start place-items-center">
        <div id="animation-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-70 overflow-hidden rounded-lg md:h-96">
                @foreach ($coffees as $coffee)
                <!-- Item -->
                <div class="hidden duration-200 ease-linear" data-carousel-item>
                    <img src="{{ $coffee->image_url }}" class="absolute block w-full h-full object-fill -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $coffee->name }}">
                </div>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full  bg-white/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

    <p class="max-w-screen-xl mx-auto lg:pt-12 items-center text-start place-items-center text-xl font-bold">Pilihan Kopi Kami</p>
    <div class="max-w-screen-xl px-4 py-8 mx-auto grid lg:grid-cols-3 gap-8 lg:px-6 items-center text-start place-items-center">
        @foreach ($coffees as $coffee)
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="p-8 rounded-t-lg h-[300px] w-full object-cover" src="{{ asset($coffee->image_url) }}" alt="product image" />
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-3xl font-semibold tracking-tight text-gray-900">
                        {{ $coffee->name }}
                    </h5>
                </a>
                <p class="text-base font-normal tracking-tight text-gray-900">
                    {{ $coffee->description }}
                </p>
                <br>
                <form action="{{ route('cart.add', $coffee->id) }}" method="POST">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" class="w-16 border rounded" />
                    <button type="submit" class="text-white bg-[#b7292e] hover:bg-[#97151b] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add to cart</button>
                </form>

            </div>
        </div>
        @endforeach

    </div>


    
</section>
@endsection