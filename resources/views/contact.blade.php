@extends('templates.main') 

@section('content')
<section>
    <div class="max-w-screen-xl px-4 pt-20 mx-auto lg:pt-24 lg:px-6 items-center text-start place-items-center">
        <p class="text-center font-semibold text-2xl">Get In Touch</p>
        <img src="../public/images/qr.jpg" alt="" class="m-auto my-6">
        <p class="text-center font-semibold text-2xl">Hubungi kami</p>
        <div class="mt-6 flex gap-6 pb-6 justify-center">
            <a href="#"
                class="text-white bg-[#b7292e] hover:bg-[#97151b] focus:ring-4 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5">Chat
                now</a>
            <div class="bg-gray-900 w-0.5"></div>
            <a href="https://gofood.co.id/surabaya/restaurant/itts-coffee-ba1ee828-8b41-432d-ad78-2114844fae31?as=gmaps"
                class="pl-4 text-white bg-[#b7292e] hover:bg-[#97151b] focus:ring-4 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5">Go-Food
                Now</a>

        </div>
    </div>
</section>
<br>
<br>
<section>
    <div class="map_main">
        <div class="map-responsive">
            <iframe
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Telkom+University+Surabaya"
                width="250" height="700" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
        </div>
    </div>
</section>
<br>
<br>
<br>
@endsection