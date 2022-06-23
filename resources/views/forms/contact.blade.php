@extends('layouts.formulario')
@section('content')

 <div class="w-full ">
       @foreach ($post as $item)
            <div class="flex flex-col items-center justify-center text-4xl font-bold text-white h-80 font-patua-one" style="background-image: url('{{asset('storage/country/'.$item->country->head)}}');background-size:cover;background-repeat:no-repeat;background-position:center;">
            <h1 class="mb-5 tracking-wider ">Planning your trip</h1>
            {{-- <h1 class="mb-5 tracking-wider">{{$item->subregion->name}}</h1> --}}
            <h1 class="mt-5 mb-5">By</h1>
            <h1 class="mt-5 tracking-wider">{{$item->country->name}}</h1>

            </div>
        @endforeach

<div class="container mx-auto">
   <h1 class="mt-5 mb-5 text-lg text-center text-gray-500">Inquire about a tailor-made trip with us</h1>
   <form action="{{ route('sendform') }}" method="post">
    <x-honeypot />
       @csrf
    <h1 class="ml-4 text-2xl text-gray-500 md:ml-0">Your details</h1>
         <div class="flex flex-col">
		  <div class="flex mt-5 text-gray-400">
              <label for="trait" class="p-2 mr-5">Title</label>
              <select name="trait" id="trait" class="p-2 border">
                <option value="">Choose...</option>
				<option value="Dr.">Dr.</option>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Ms.">Ms.</option>
				<option value="Miss.">Miss.</option>
              </select>
            </div>
          @foreach ($post as $item)

             <input type="hidden" name="postname" value="{{ $item->title }}">
             <input type="hidden" name="subregion" value="{{ $item->subregion->name }}">
             <input type="hidden" name="countryname" value="{{ $item->country->name }}">
          @endforeach
          <input type="hidden" name="code" value="{{ Str::orderedUuid(); }}">
            <div class="grid grid-cols-1 gap-4 mt-5 ml-4 mr-4 md:grid-cols-2 md:ml-0 md:mr-0">
              <div class="border-b-2 border-gray-400 ">
                <input type="text" placeholder="Name*" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="name" required>
              </div>

              <div class="border-b-2 border-gray-400 ">
                <input type="text" placeholder="Phone*" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="phone" required>
              </div>
              <div class="border-b-2 border-gray-400 ">
                <input type="text" placeholder="Surname*" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="surname" required>
              </div>

              <div class="border-b-2 border-gray-400 ">
                <input type="text" placeholder="City*" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="city" required>
              </div>

            </div>
     <div class="flex flex-col w-full mt-5 ml-4 mr-4 md:flex-row md:ml-0 md:mr-0">
              <div class="w-full mb-4 mr-4 border-b-2 border-gray-400 md:mb-0 md:w-1/2">
                <input type="email" placeholder="Email*" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="email" required>
              </div>

              <div class="w-full mb-4 mr-2 border-b-2 border-gray-400 md:mb-0 md:w-1/4">
                <input type="text" placeholder="State*" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="state" required>
              </div>
              <div class="w-full mb-4 border-b-2 border-gray-400 md:mb-0 md:w-1/4">
                <input type="text" placeholder="Zip Code" class="w-full p-2 bg-transparent border-none outline-none appearance-none" name="zipcode">
              </div>


            </div>
         <div class="flex flex-col w-full mt-5 ml-4 mr-4 md:flex-row md:ml-0 md:mr-0">
              <div class="flex flex-col w-full mr-3 md:w-1/2">
                <h1 class="ml-4 text-2xl text-gray-500 md:ml-0">Your travel plans</h1>
				<p class="text-xs">Later will define the departure date.</p>
                <div class="flex flex-col justify-between p-2 mb-3 text-gray-500 md:flex-row">
                  <label class="w-1/4 p-2" for="dur">Duration</label>
                  <select name="duration" id="dur" class="w-3/4 p-2 border ">
                    <option value="">Choose duration.</option>
                    <option value="about-a-week">About a week</option>
                    <option value="two-to-three-weeks">Two to three weeks</option>
                    <option value="a-month-or-more">A month or more</option>
                  </select>
                </div>
                <div class="flex flex-col justify-between p-2 mb-3 text-gray-500 md:flex-row">
                  <label class="w-1/4 p-2" for="season">Season</label>
                  <select name="season" id="season" class="w-3/4 p-2 border">
                    <option value="">Choose season.</option>
                    <option value="spring">Spring</option>
                    <option value="summer">Summer</option>
                    <option value="winter">Winter</option>
                    <option value="autumm">Autumm</option>
                  </select>
                </div>
                <div class="flex flex-col justify-between p-2 mb-3 text-gray-500 md:flex-row">
                  <label class="w-1/4 p-2" for="travel">Travellers</label>
                  <select name="travellers" id="travel" class="w-3/4 p-2 border">
                    <option value="">Choose travellers</option>
                    <option value="individual">Individual</option>
                    <option value="couple">Couple</option>
                    <option  value="family">Family</option>
                    <option value="group">Group</option>
                  </select>
                </div>
                <div class="flex-row justify-center hidden p-2 mb-3 text-gray-500 " id="child">
                  <input type="checkbox" name="children" value="Travel with children">
                  <label class="ml-4">Travel with children</label>
                </div>
              </div>
              <div class="flex flex-col w-full md:w-1/2">
                <h1 class="ml-4 text-2xl text-gray-500 md:ml-0">Trip type</h1>
                <div class="flex flex-row justify-start mt-5 ml-4 text-gray-500">
                  <input type="radio" name="triptype" id="" value="leisure">
                  <div class="ml-5">
                    <h4 class="text-xl">Mostly leisure</h4>
                    <p class="text-xs">A leisure attractions trip with some cultural and gourmet attractions</p>
                  </div>
                </div>
                <div class="flex flex-row justify-start mt-5 ml-4 text-gray-500">
                  <input type="radio" name="triptype" id="" value="cultural">
                  <div class="ml-5">
                    <h4 class="text-xl">Mostly cultural</h4>
                    <p class="text-xs">A cultural attractions trip with some leisure and gourmet attractions</p>
                  </div>
                </div>
                <div class="flex flex-row justify-start mt-5 ml-4 text-gray-500">
                  <input type="radio" name="triptype" id="" value="gourmet">
                  <div class="ml-5">
                    <h4 class="text-xl">Mostly gourmet</h4>
                    <p class="text-xs">A gourmet attractions trip with some cultural and leisure attractions</p>
                  </div>
                </div>
                <div class="flex flex-row justify-start mt-5 ml-4 text-gray-500">
                  <input type="radio" name="triptype" id="" value="adventure">
                  <div class="ml-5">
                    <h4 class="text-xl">Adventure trip</h4>
                    <p class="text-xs">With some cultural and gourmet attractions</p>
                  </div>
                </div>

              </div>

            </div>
          <h1 class="mt-4 mb-4 ml-4 text-lg text-gray-500 md:ml-0">Other specifications</h1>
            <div class="flex flex-col justify-start md:flex-row">
              <div class="flex flex-row justify-center ml-3 md:0">
                <input type="checkbox" name="specifications[]" id="" value="romantic">
                <p class="ml-4 text-gray-500">Romantic trip</p>
              </div>
              <div class="flex flex-row justify-center ml-6 md:flex-row">
                <input type="checkbox" name="specifications[]" id="" value="reduced">
                <p class="ml-4 text-gray-500">Reduced mobility</p>
              </div>

            </div>
            <h1 class="mt-4 mb-4 ml-4 text-2xl text-gray-500 md:ml-0">More info</h1>
            <div>
              <textarea class="w-full border-4 border-gray-400 appearance-none"  name="message" id="" cols="30" rows="10">
                @foreach ($post as $item)
                    I am interest for : {{ $item->title }}
                @endforeach

              </textarea>
            </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="flex flex-col">
                @foreach ($post as $item)
                <h1 class="mt-5 text-lg text-gray-500"> Countries of {{ $item->subregion->name }}</h1>
                @endforeach

                <div class="flex flex-row items-center justify-center w-full mt-5">
                    <select name="countries[]" id="one" multiple="multiple">

                        @foreach ($countries as $country)

                        <option value="{{ $country->name }}">{{ $country->name }}</option>


                    @endforeach
                    </select>

                </div>

            </div>
            <div class="flex flex-col">

               <h1  class="mt-5 text-lg text-center text-gray-500">More sites related</h1>
               <div class="flex flex-col justify-start w-full mt-5">

               @foreach ($items as $box)
               <div class="flex flex-row items-center justify-center mx-auto ">
                   <input type="checkbox" name="posts[]" id="" value="{{ $box->title }}">
                   <p class="ml-4 text-gray-500">{{ $box->title }}</p>
                 </div>
               @endforeach

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


            </div>

   </form>
</div>

 </div>

@endsection
@section('js')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/easySelect.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#travel').on('change', function() {
   if ( this.value == 'family'){
       $("#child").show();
   }
   else{
       $("#child").hide();
   }
   });
     });
</script>
<script>
   $("#one").easySelect({
         buttons: true, //
        //  search: true,
         placeholder: 'Choose countries',
         placeholderColor: '#524781',
         selectColor: '#524781',
         itemTitle: 'Countrys selected',
         showEachItem: true,
         width: '80%',
         dropdownMaxHeight: '450px',
     })

</script>
@endsection
