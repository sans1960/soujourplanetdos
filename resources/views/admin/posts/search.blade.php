@extends('layouts.admin')
@section('content')
    <div class="container mx-auto mt-5 flex justify-center items-center">
        <div class="w-3/4 mx-auto">
            <form action="{{ route('search') }}" method="post">
                @csrf
                <div class="w-full flex flex-row justify-between items-center">
                    <input type="text" name="search" id="" class="w-3/4 p-3 border-2 border-blue-600 rounded-lg" autofocus placeholder="Enter your text">
                    <button type="submit" class="ml-4 px-4 py-2 bg-gray-800 text-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                          </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
<div class="container mx-auto mt-8">


    <table class="block min-w-full border-collapse md:table">
        <thead class="block md:table-header-group">
            <tr class="absolute block border border-grey-500 md:border-none md:table-row -top-full md:top-auto -left-full md:left-auto md:relative ">
                <th class="block p-2 font-bold text-center text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Title</th>


                <th colspan="2" class="block p-2 font-bold text-center text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Actions</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
          @if (isset($posts))
              @foreach ($posts as $post)
              <tr>
                <td class="block p-2 text-center md:border md:border-grey-500 md:table-cell">{{ $post->title }}</td>

                <td>
                    <a class="text-center" href="{{ route('admin.posts.edit',$post) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                    </a>
                </td>
                <td>
                    <a class="text-center" href="{{ route('admin.posts.show',$post) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                    </a>
                </td>
                </tr>
              @endforeach


                      @else



          @endif
        </tbody>
      </table>


</div>
@endsection
