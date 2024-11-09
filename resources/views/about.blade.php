{{-- resources/views/about.blade.php --}}
@extends('templates.main')

@section('title', 'Teskop | About')

@section('content')
<section class="">
    <div
        class="max-w-screen-xl px-4 py-20 mx-auto grid lg:grid-cols-2 gap-8 lg:py-24 lg:px-6 items-center text-start place-items-center">
        <div>
            <h3 class="text-gray-800 max-w-2xl mb-4 text-xl font-extrabold leading-none tracking-tight md:text-2xl xl:text-4xl">
                Telkom University Coffee
            </h3>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">
                Didirikan pada tahun 2021 dengan nama awal ITTS Coffee sekarang Teskop, tujuan pembuatan cafe ini adalah
                sebagai wadah mahasiswa yang ingin nongkrong atau bertukar fikiran tanpa harus keluar kampus. Teskop juga dapat
                menjadi batu loncatan mahasiswa yang ingin belajar berwirausaha dengan menjadi salah satu barista.
            </p>
        </div>
        <div>
            <img src="{{ asset('images/about.png') }}" alt="About Teskop">
        </div>
    </div>
</section>
@endsection
