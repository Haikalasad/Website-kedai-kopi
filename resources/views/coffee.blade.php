@extends('templates.main')

@section('content')
<section>
    <div class="max-w-screen-xl px-4 pt-20 mx-auto lg:pt-24 lg:px-6 items-center text-start place-items-center">
        <div id="animation-carousel" class="relative w-full">
            <!-- Carousel wrapper -->
            <div class="relative h-full overflow-hidden rounded-lg md:h-96">
                <!-- Item -->
                <div>
                    <img src="{{ asset('images/PromoBanner.png') }}" class="absolute block w-full h-full object-fill -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                </div>
            
            </div>
            
        </div>
    </div>

    <p class="max-w-screen-xl mx-auto lg:pt-12 items-center text-start place-items-center text-xl font-bold">Pilihan Kopi Kami</p>
    <div class="max-w-screen-xl px-4 py-8 mx-auto grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8 items-center text-start place-items-center">
    @foreach ($coffees as $coffee)
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
        <a href="#">
           
            <img src="{{ filter_var($coffee->image_url, FILTER_VALIDATE_URL) ? $coffee->image_url : asset('storage/' . $coffee->image_url) }}" 
                    class="p-4 rounded-t-lg h-64 w-full object-cover" 
                    alt="{{ $coffee->name }}">
        </a>
        <div class="px-5 pb-5">
            <a href="#">
                <h5 class="text-xl font-bold tracking-tight text-gray-800 hover:text-[#b7292e] transition-colors duration-200">
                    {{ $coffee->name }}
                </h5>
            </a>
            <p class="mt-2 text-sm font-medium text-gray-600 truncate">
                {{ $coffee->description }}
            </p>
            <div class="mt-4 flex justify-between items-center">
                <div class="text-lg font-bold text-gray-800">
                    Rp{{ number_format($coffee->price, 0, ',', '.') }}
                </div>
            </div>
            <form action="{{ route('cart.add', $coffee->id) }}" method="POST" class="mt-4 flex items-center space-x-2">
                @csrf
                <input type="number" name="quantity" value="1" min="1" class="w-16 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#b7292e] focus:outline-none text-center" />
                <button type="submit" class="w-full text-white bg-[#b7292e] hover:bg-[#97151b] focus:ring-4 focus:outline-none focus:ring-[#b7292e] font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Add to cart
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>



    
</section>
@endsection