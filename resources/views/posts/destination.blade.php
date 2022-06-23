@extends('layouts.front')
@section('content')


<div class="container mx-auto "></div>
    <div>
        <h1 class="mt-5 text-2xl text-center font-patua-one">{{ $destination->name }}</h1>
    </div>


</div>
<div class="container mx-auto border-b-4 border-b-gray-400">
    <div class="flex flex-row flex-wrap justify-around mt-5 text-xs md:text-sm lg:text-base font-open-sans ">
        {{-- <a href="" class="m-2 font-bold">All Countries</a> --}}
        @foreach ($countries as $country)
        <a href="{{ route('posts.countries',$country) }}" class="m-2 hover:font-bold">{{ $country->name }}</a>
        @endforeach


    </div>
</div>
<div class="container w-3/4 mx-auto">
    <div class="flex flex-col items-center w-full mx-auto mt-5 md:w-1/4">
        <button id="btn" class="p-3 text-xl hover:bg-slate-600 hover:text-white rounded-xl font-patua-one">Categories</button>
        <div id="drop" style="display: none; position:absolute;" class="flex flex-col items-center justify-around p-8 mt-16 bg-white" >
           @foreach ($categories as $category)
              <div class="p-3" style="">
                <a class="p-3 text-xl font-patua-one hover:text-red-900" href=" {{ route('posts.destcat',[$destination,$category]) }}">{{ $category->name }}</a>
              </div>

           @endforeach
        </div>

    </div>

</div>

<div class="container grid w-3/4 grid-cols-1 gap-5 mx-auto mt-5 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($posts as $post)
    <a href="{{ route('posts.post',$post) }}">
        <div class="overflow-hidden rounded-lg shadow-xl">
            <img src="{{ asset('storage/photos/'.$post->photo->image) }}" alt="">
            <p class="m-2 text-gray-500">{{ $post->country->name }}</p>
            <h2  class="m-2 text-lg font-patua-one hover:text-blue-900">{{ $post->title }}</h2>
            <p class="m-2 text-gray-500">{{ $post->category->name }}</p>
        </div>
    </a>
    @endforeach





</div>
<div class="container mx-auto mt-8">
    {!! $posts->links() !!}
</div>
@endsection
@section('js')

<script>
$(document).ready(function(){
    $('#btn').click(function() {
      $('#drop').toggle("slide");
    });
});
</script>
@endsection
