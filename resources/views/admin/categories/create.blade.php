@extends('layouts.admin')
@section('content')
<div class="container mx-auto">
    <div class="w-1/2 p-4 mx-auto mt-5 ">
        <h1 class="mt-5 text-xl text-center font-patua-one"> Create Destination</h1>
        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <input id="" type="text" class="w-full p-2 mt-5 border-2 border-blue-500 rounded-lg " name="name" value="" placeholder="Category name" required  autofocus>
            <button type="submit" value="" class="px-4 py-2 mt-5 text-white bg-gray-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                  </svg>
            </button>
        </form>
    </div>

</div>


@endsection
