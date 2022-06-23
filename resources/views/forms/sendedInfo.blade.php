@extends('layouts.formulario')
@section('content')
<div class="flex flex-col items-center justify-center w-full h-screen p-4 text-4xl font-bold text-white font-patua-one" style="background-image: url('https://cdn.pixabay.com/photo/2022/06/02/11/12/felucca-7237715_960_720.jpg');background-size:cover;background-repeat:no-repeat;background-position:center;">
    <h1 class="mb-4">Thanks {{ $info['trait'] }} {{ $info['name'] }} {{ $info['surname'] }}</h1>
    <h1 class="mb-4">Your interest for: {{ $info['article'] }}</h1>
    <h1 class="mb-4">Soon recived ours notices</h1>
    <a class="px-8 py-2 tracking-wider bg-gray-800 border-2 border-gray-900 cursor-pointer rounded-3xl hover:bg-gray-800 hover:text-white font-patua-one" href="{{ route('sites') }}">
     Home
    </a>

</div>

@endsection
