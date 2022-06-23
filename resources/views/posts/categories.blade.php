@extends('layouts.front')
@section('content')

<div class="container mx-auto border-b-4 border-b-gray-400">
    <div>
        <h1 class="mt-5 text-center font-patua-one text-2xl">{{ $category->name }}</h1>
    </div>


</div>

<div class="container mx-auto border-b-4 border-b-gray-400">
    <div class="flex flex-row flex-wrap justify-around mt-5 text-xs md:text-sm lg:text-base font-open-sans ">

        @foreach ($categories as $category)
        <a href="{{ route('posts.categories',$category) }}" class="m-2 hover:font-bold">{{ $category->name }}</a>
        @endforeach


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
