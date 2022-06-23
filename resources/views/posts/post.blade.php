@extends('layouts.post')
@section('content')

<div class="flex flex-col w-full mt-5 ml-2 mr-2 border-b-4 lg:w-3/4 lg:mx-auto border-b-gray-900">
    <figure>
        <img class="w-full mx-auto rounded-lg md:w-3/4" src="{{ asset('storage/photos/'.$post->photo->image) }}" alt="Trulli" >
        <figcaption class="text-center text-gray-600 font-open-sans">{{ $post->photo->caption }}</figcaption>
    </figure>
      <h1 class="mt-5 mb-5 text-3xl text-center font-patua-one">{{ $post->title }}</h1>
      <div class="flex items-center justify-center mt-5 mb-5 text-gray-600 font-patua-one">


        <p class="mr-3 text-sm md:text-xl">{{ $post->country->name }}</p>
        <p>|</p>
        <p class="ml-3 text-sm md:text-xl">{{ $post->category->name }}</p>
    </div>
    <div class="w-3/4 p-3 mx-auto mt-3 tracking-wide text-gray-600 md:w-2/3 font-open-sans indent-0 lg:w-3/5 lg:text-lg">
        {!! $post->extract !!}
    </div>
    <div class="w-3/4 p-3 mx-auto tracking-wide text-gray-600 md:w-2/3 font-open-sans indent-0 lg:w-3/5 lg:text-lg">
       {!! $post->body !!}
   </div>
   <div class="flex items-center justify-center mx-auto mt-4 mb-5">
    <a class="px-8 py-2 text-sm tracking-wider bg-white border-2 border-gray-900 cursor-pointer md:text-base rounded-3xl hover:bg-gray-800 hover:text-white font-patua-one" href="{{ route('contact',[$post->destination_id,$post->slug,$post->subregion_id,$post->country_id]) }}">Start to plan my trip</a>
   </div>
   <div id="map" class="flex justify-center mx-auto" style="width: 100%;height:400px;">
    <script>
        var map = L.map('map').setView([{{ $post->location->latitud }}, {{ $post->location->longitud }}], {{ $post->location->zoom }});

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={{ env("MAP_KEY") }}' ,{
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,

    }).addTo(map);

    L.marker([{{ $post->location->latitud }}, {{ $post->location->longitud }}]).addTo(map);
        // .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        // .openPopup();
    </script>
    </div>
    <div class="inline-flex mb-2 social-share">
    <p>Share this Post with: <span> {!! Share::currentPage('Share')->facebook()->twitter(); !!}</span></p>

    </div>
</div>

<div class="w-3/4 mx-auto mt-5 mb-5">
    <h3 class="mt-6 text-2xl text-center font-patua-one">Posts relataded</h3>
    <div class="owl-carousel owl-theme">

        @foreach ($posts as $post)

        <div class="flex flex-col justify-center item">
            <a class="mx-auto " href="{{ route('posts.post',$post) }}">
                <div class="m-5 overflow-hidden rounded-lg shadow-xl ">
                    <img src="{{ asset('storage/photos/'.$post->photo->image) }}" alt="">
                    <p class="m-2 text-gray-500">{{ $post->country->name }}</p>
                    <h2  class="m-2 text-lg font-patua-one hover:text-blue-900">{{ $post->title }}</h2>
                    <p class="m-2 text-gray-500">{{ $post->category->name }}</p>
                </div>
            </a>

        </div>



        @endforeach
    </div>
</div>

@endsection
@section('js')

<script src="{{ asset('js/share.js') }}"></script>



<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
</script>

@endsection

