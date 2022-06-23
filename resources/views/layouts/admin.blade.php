<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <style>
        #sortbox:checked ~ #sortboxmenu {
            opacity: 1;
        }
    </style>




</head>
<body>
    <div class="flex flex-row items-center justify-between p-4 text-xl text-white bg-gray-700 border-b-4 font-patua-one">
        <div class="flex justify-center">
            <img src="{{ asset('img/ll.webp') }}" alt="" width="50">
        </div>
        <div class="flex flex-row items-center justify-around">
          <a href="{{ route('index') }}" class="mr-4">Home</a>
          <a href="{{ route('admin.destinations.index') }}"  class="mr-4">Destinations</a>
          <a href="{{ route('admin.subregions.index') }}"  class="mr-4">Subregions</a>
          <a href="{{ route('admin.categories.index') }}"  class="mr-4">Categories</a>
          <a href="{{ route('admin.countries.index') }}"  class="mr-4">Countries</a>
          <a href="{{ route('admin.posts.index') }}"  class="mr-4">Posts</a>
          <a href="{{ route('admin.photos.index') }}"  class="mr-4">Images</a>
          <a href="{{ route('admin.locations.index') }}"  class="mr-4">Locations</a>
          <div class="relative">
            <input type="checkbox" id="sortbox" class="hidden absolute">
            <label for="sortbox" class="flex items-center space-x-1 cursor-pointer">
            <span class="text-lg">Pages</span>
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </label>

                <div id="sortboxmenu" class="absolute mt-1 right-1 top-full min-w-max shadow rounded opacity-0 bg-gray-300 border border-gray-400 transition delay-75 ease-in-out z-10">
                <ul class="block text-right text-gray-900">

                    <li>
                        <a href="{{ route('admin.tags.index') }}"  class="block px-3 py-2 hover:bg-gray-200">Tags</a>
                    </li>
                    <li><a href="{{ route('admin.pages.index') }}" class="block px-3 py-2 hover:bg-gray-200">Pages</a></li>
                    <li><a href="{{ route('admin.articles.index') }}" class="block px-3 py-2 hover:bg-gray-200">Articles</a></li>
                </ul>
            </div>
        </div>

          <a href="{{ route('admin.data') }}"  class="ml-6 mr-4">Data</a>
          <a href="{{ route('admin.info') }}"  class="ml-6 mr-4">Info</a>


          <a href="{{ route('find') }}"  class="mr-4">Find</a>
        </div>
        <div class="flex flex-row ">
            <a href=""  class="mr-4">  {{ Auth::user()->name }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                      </svg>
                </button>
            </form>
        </div>

    </div>




@yield('content')








@yield('js')

</body>
</html>
