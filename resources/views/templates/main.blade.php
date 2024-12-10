{{-- resources/views/layouts/main.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FLOWBITE -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Navbar -->
    <header class="fixed w-full shadow z-50">
    <nav class="bg-black border-gray-200 py-2.5">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="#" class="flex items-center">
            <img src="{{ asset('images/telu.png') }}" class="h-6 mr-3 sm:h-9" alt="Logo teskop" />
            <span class="self-center text-2xl font-bold whitespace-nowrap text-gray-400">Teskop</span>
        </a>
        <div class="flex items-center lg:order-2">
        @auth
            <div class="relative">
                <button onclick="toggleDropdown()" class="flex items-center focus:outline-none">
                    <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-profile.png') }}" 
                        alt="Profile"
                        class="h-8 w-8 rounded-full mr-2" />
                </button>
                <!-- Dropdown menu -->
                <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-700 hover:bg-red-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
            @else
            <a href="{{ route('login.index') }}" class="text-white bg-[#b7292e] hover:bg-[#97151b] focus:ring-4 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-2">Login</a>
            @endauth
            <a href="{{ route('cart.index') }}" class="relative text-white bg-black hover:bg-[#97151b] focus:ring-4 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l1-5H6L5 3H3m0 0h3.4M6 9h12.8M7 16v5m0 0h.01M17 16v5m0 0h.01M7 20h10"></path>
                </svg>
                @if ($cartItemCount > 0)
                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold text-white bg-red-600 rounded-full">{{ $cartItemCount }}</span>
                @endif
            </a>
            <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li><a href="{{ route('home') }}" class="block py-2 pl-3 pr-4 {{ Route::is('home') ? 'text-white font-bold' : 'text-gray-500 hover:text-white' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="block py-2 pl-3 pr-4 {{ Route::is('about') ? 'text-white font-bold' : 'text-gray-500 hover:text-white' }}">About</a></li>
                <li><a href="{{ route('coffee') }}" class="block py-2 pl-3 pr-4 {{ Route::is('coffee') ? 'text-white font-bold' : 'text-gray-500 hover:text-white' }}">Coffee</a></li>
                <li><a href="{{ route('blog') }}" class="block py-2 pl-3 pr-4 {{ Route::is('blog') ? 'text-white font-bold' : 'text-gray-500 hover:text-white' }}">Blog</a></li>
                <li><a href="{{ route('contact') }}" class="block py-2 pl-3 pr-4 {{ Route::is('contact') ? 'text-white font-bold' : 'text-gray-500 hover:text-white' }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

    </header>

    <!-- Main Content -->
    <main class="pt-8">
        @yield('content')
        @include('sweetalert::alert')

    </main>

    <footer class="bg-white">
        <div class="p-4 py-6 mx-auto lg:py-6 md:p-8 lg:p-60 bg-black">
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-5">
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-white uppercase">Home</h3>
                    <ul class="text-gray-500 ">
                        <li class="mb-4">
                            <a href="#" class=" hover:underline">Teskop</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Barista</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Question</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-white uppercase">About</h3>
                    <ul class="text-gray-500 ">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">About</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-white uppercase ">Coffess</h3>
                    <ul class="text-gray-500 ">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Promo</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">My Coffee</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-white uppercase ">Blog</h3>
                    <ul class="text-gray-500 ">
                        <li class="mb-4">
                            <a href="#" class=" hover:underline">News</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-white uppercase">Contact</h3>
                    <ul class="text-gray-500 ">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Contact</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Location</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center py-8 bg-black">
            <a href="#" class="flex items-center justify-center mb-5 text-2xl font-semibold text-white">
                <img src="images/telu.png" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" />
                Teskop
            </a>
            <div class="flex gap-4 justify-center">
                <p class="pb-3 block text-sm text-center text-gray-500"><i class="pr-2 fa-solid fa-phone"></i>+01 1234567890</p>
                <p class="pb-3 block text-sm text-center text-gray-500"><i class="pr-2 fa-solid fa-envelope"></i>+01 1234567890</p>

            </div>
            <span class="block text-sm text-center text-gray-500">©Teskop - PemWeb Project
            </span>
            <ul class="flex justify-center mt-5 space-x-5">
                <li>
                    <a href="https://www.facebook.com/search/people/?q=ITTS%20Coffee" class="text-gray-500 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/ittscoffee/" class="text-gray-500 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://x.com/search?q=ittscoffee" class="text-gray-500 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- FLOWBITE -->
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    }
</script>


</html>