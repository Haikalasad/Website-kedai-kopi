@extends('templates.main')

@section('title', 'Teskop | Home')

@section('content')

<!-- Start block -->
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1
                class="text-gray-800 max-w-2xl mb-4 text-3xl font-extrabold leading-none tracking-tight md:text-4xl xl:text-5xl">
                Telkom University <br>Coffee</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">Nikmati
                cita rasa kopi terbaik di Telkom University Coffee. Dibuat dari biji kopi pilihan, setiap cangkir
                menawarkan kenikmatan otentik yang membangkitkan semangat. Dengan berbagai pilihan, mulai dari espresso
                hingga latte, dan suasana nyaman yang ideal untuk belajar atau bersantai, kami menyajikan pengalaman
                kopi yang tak terlupakan. Dukung komunitas lokal dengan setiap tegukan dan temukan kesempurnaan di
                setiap cangkir. Kunjungi kami di Telkom University dan rasakan sendiri keajaiban kopi kami.</p>
            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <a href="about.php"
                    class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100">
                    <img src="images/telu.png" alt="logo teskop" class="w-6 pr-3"> View More
                </a>
            </div>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="images/hero-1.jpg" alt="hero image">
        </div>
    </div>
</section>
<!-- End block -->
<br>
<!-- Start block -->
<section class="bg-[#b7292e]">
    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
        <figure class="max-w-screen-md mx-auto">
            <svg class="h-12 mx-auto mb-3 text-white dark:text-gray-600" viewBox="0 0 24 27" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                    fill="currentColor" />
            </svg>
            <blockquote>
                <p class="text-xl font-medium text-white md:text-2xl ">"Melayani pelanggan dengan
                    sepenuh hati adalah prioritas kami, Senantiasa memberikan cita rasa kopi yang terbaik."</p>
            </blockquote>
            <figcaption class="flex items-center justify-center mt-6 space-x-3">
                <img class="w-6 h-6 rounded-full"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png"
                    alt="profile picture">
                <div class="flex items-center divide-x-2 divide-white">
                    <div class="pr-3 font-medium text-white">Steffani Debora</div>
                    <div class="pl-3 text-sm font-light text-white">Barista Teskop</div>
                </div>
            </figcaption>
        </figure>
    </div>
</section>
<!-- End block -->
<br>
<br>
<!-- Start block -->
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-24 lg:px-6 ">
        <h2
            class="mb-6 text-3xl font-extrabold tracking-tight text-center text-gray-900 lg:mb-8 lg:text-3xl dark:text-white">
            Kamu mungkin ingin tahu</h2>
        <div class="max-w-screen-md mx-auto">
            <div id="accordion-flush" data-accordion="collapse"
                data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h3 id="accordion-flush-heading-1">
                    <button type="button"
                        class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-900 bg-white border-b border-gray-200"
                        data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                        aria-controls="accordion-flush-body-1">
                        <span>Jam buka Teskop</span>
                        <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h3>
                <div id="accordion-flush-body-1" class="" aria-labelledby="accordion-flush-heading-1">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Teskop buka setiap hari dari jam 09:00 - 21:00
                            dan akan tutup ketika libur nasional</p>
                    </div>
                </div>
                <h3 id="accordion-flush-heading-2">
                    <button type="button"
                        class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-900 bg-white border-b border-gray-200"
                        data-accordion-target="#accordion-flush-body-2" aria-expanded="true"
                        aria-controls="accordion-flush-body-2">
                        <span>Siapa barista di Teskop</span>
                        <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h3>
                <div id="accordion-flush-body-2" class="" aria-labelledby="accordion-flush-heading-2">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Barista di Tesop adalah mahasiswa dari Telkom
                            University Surabaya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection