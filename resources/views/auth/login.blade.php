@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
                 <div class="w-1/2 p-4 mx-auto">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="flex flex-col items-center justify-around">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>


                                <input id="email" type="email" class="w-full p-2 mt-5 border-2 border-blue-500 rounded-lg " name="email" value="{{ old('email') }}" required  autofocus>
                                <label for="password" class="mt-5">{{ __('Password') }}</label>

                                <input id="password" type="password" class="w-full p-2 mt-5 border-2 border-blue-500 rounded-lg" name="password" required>
                                <button type="submit" value="" class="px-4 py-2 mt-5 text-white bg-gray-700 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                      </svg>
                                </button>
                        </div>



                    </form>
                </div>

</div>
@endsection
