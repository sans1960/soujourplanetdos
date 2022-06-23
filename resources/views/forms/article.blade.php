@extends('layouts.formulario')
@section('content')
<div class="w-full flex flex-col items-center justify-center text-4xl font-bold text-white h-80 font-patua-one" style="background-image: url('{{asset('storage/articles/'.$article->image)}}');background-size:cover;background-repeat:no-repeat;background-position:center;">
    {{-- <h1 class="mt-5 tracking-wider">{{$article->name}}</h1> --}}
</div>
<div class="container mx-auto">
    <h1 class="mt-5 mb-5 text-base md:text-2xl text-center font-patua-one text-gray-900">Get more info about {{ $article->name }}</h1>
    <form action="{{ route('sendformarticle') }}" method="POST">
        <x-honeypot />
        @csrf
     {{-- <h1 class="ml-4 text-2xl text-gray-500 md:ml-0">Your details</h1>
     <h1 class="ml-4 text-2xl text-gray-500 md:ml-0">{{ $article->name }}</h1>
     <h1 class="ml-4 text-2xl text-gray-500 md:ml-0">{{ $article->page->name }}</h1>
     <h1 class="ml-4 text-2xl text-gray-500 md:ml-0">{{ $article->page->tag->name }}</h1> --}}

          <div class="flex flex-col">

              <h1 class="mt-4 mb-4 ml-4 text-2xl text-gray-500 md:ml-0">Your interests</h1>
              <div>
                <textarea class="w-full border-4 border-gray-400 appearance-none"  name="message" id="" cols="30" rows="10">


                </textarea>
              </div>
              <div class="flex mt-5 text-gray-400">
                <label for="trait" class="p-2 mr-5">Title*</label>
                <select name="trait" id="trait" class="p-2 border" required>
                  <option value="">Choose...</option>
                  <option value="Dr.">Dr.</option>
                  <option value="Mr.">Mr.</option>
                  <option value="Mrs.">Mrs.</option>
                  <option value="Ms.">Ms.</option>
                  <option value="Miss.">Miss.</option>
                </select>
              </div>
              <input type="hidden" name="article" value="{{ $article->name }}">
              <input type="hidden" name="tag" value="{{ $article->page->tag->name }}">
              <input type="hidden" name="page" value="{{ $article->page->name }}">
              <input type="hidden" name="code" value="{{ Str::orderedUuid(); }}">
              <div class="grid grid-cols-1 gap-4 mt-5 ml-4 mr-4 md:grid-cols-2 md:ml-0 md:mr-0">
                <div class="border-b-2 border-gray-400 ">
                  <input type="text" placeholder="Name*" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="name" required>
                </div>

                <div class="border-b-2 border-gray-400 ">
                  <input type="text" placeholder="Phone" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="phone" >
                </div>
                <div class="border-b-2 border-gray-400 ">
                  <input type="text" placeholder="Surname*" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="surname" required>
                </div>

                <div class="border-b-2 border-gray-400 ">
                  <input type="text" placeholder="City" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="city">
                </div>

              </div>
              <div class="flex flex-col w-full mt-5 ml-4 mr-4 md:flex-row md:ml-0 md:mr-0">
                 <div class="w-full mb-4 mr-4 border-b-2 border-gray-400 md:mb-0 md:w-1/2">
                   <input type="email" placeholder="Email*" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="email" required>
                 </div>

                 <div class="w-full mb-4 mr-2 border-b-2 border-gray-400 md:mb-0 md:w-1/4">
                   <input type="text" placeholder="State" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="state">
                 </div>
                 <div class="w-full mb-4 border-b-2 border-gray-400 md:mb-0 md:w-1/4">
                   <input type="text" placeholder="Zip Code" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="zipcode">
                 </div>


               </div>

          </div>
          <div class="flex flex-col items-center justify-center w-full p-5 mt-5">
            <div class="mb-4 text-gray-500">
              <input type="radio"  name="legal" required >
              <label>I aprove the <span><a href="https://sojournplanet.com/privacy-policy" target="_blank" style="text-decoration: underline;"><b>Privacy Policy</b></a></span>, and the <span><a href="https://sojournplanet.com/terms-and-conditions" target="_blank" style="text-decoration: underline;"><b>Terms and Conditions</b></a></span></label><br>
              </div>
            <input class="px-8 py-2 tracking-wider bg-white border-2 border-gray-900 cursor-pointer rounded-3xl hover:bg-gray-800 hover:text-white font-patua-one" type="submit" value="Send" name="send">

          </div>
    </form>


</div>

@endsection
