@extends('layouts.essential')
@section('content')
@include('layouts.banner')
<div class="container flex flex-row items-center justify-around mx-auto mt-4 mb-4 border-b-4 border-b-gray-700">
    @foreach ($tags as $tag)
        <a href="{{ route('tags.pages',$tag) }}" class="mb-4 text-xs md:text-sm lg:text-base font-open-sans ">{{ $tag->name }}</a>
    @endforeach

</div>
<div class="container w-3/4 mx-auto mt-5">

    <div class="container grid grid-cols-1 gap-5 mx-auto mt-5 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($pages as $page)
    <a href="{{ route('sites.articles',$page) }}">
        <div class="flex flex-col w-full mb-6 overflow-hidden rounded-lg shadow-xl">
            <div class="flex items-center justify-center w-full">
                <img
              class="object-fill"
              src="{{ asset('storage/pages/'.$page->image) }}"
              alt="image"
            />
            </div>
            <div class="flex flex-row items-center justify-between p-2">
                <p class="mt-2 font-open-sans">{!! \Carbon\Carbon::parse($page->date)->format('F j, Y') !!}</p>
                <p class="mt-2  font-open-sans">{{ $page->tag->name }}</p>
            </div>

            <div class="p-2 flex justify-start">
              <h4 class="mb-3 text-2xl tracking-tight font-patua-one ">
                {{ $page->name }}
              </h4>



            </div>
        </div>
    </a>


    @endforeach
    </div>

</div>

@endsection
