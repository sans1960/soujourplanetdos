<div class="container mx-auto border-b-4 border-b-gray-400">

    <div class="flex flex-row flex-wrap justify-around mt-5 text-xs md:text-sm lg:text-base font-open-sans ">

        @foreach ($destinations as $destination)
        <a href="{{ route('posts.destination',$destination) }}" class="m-2 ">{{ $destination->name }}</a>
        @endforeach


    </div>
</div>
