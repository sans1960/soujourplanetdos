@extends('layouts.admin')
@section('content')
<div class="container mx-auto">
    <div class="w-3/4 p-4 mx-auto mt-5 ">
        <h1 class="mt-5 text-xl text-center font-patua-one"> Edit Tag</h1>
        <form action="{{ route('admin.tags.update',$tag) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input id="" type="text" class="w-full p-2 mt-5 border-2 border-blue-500 rounded-lg " name="name" value="{{ $tag->name }}" placeholder="Tag name" required >
            <div class="w-1/2 h-auto mt-5 p-2 bg-cover">
                <img id="preview-image-before-upload" src="{{ asset('storage/tags/'.$tag->image) }}"
                alt="preview image" >
            </div>
            <input type="file" name="image" id="image" class="border-2 border-blue-500 mt-5 p-2 w-full rounded-lg">
            <textarea name="description" id="description" cols="30" class="w-full p-2 mt-5 border-2 border-blue-500 rounded-lg" placeholder="Caption" rows="10">
               {!! $tag->description !!}
            </textarea>
            <button type="submit" value="" class="px-4 py-2 mt-5 text-white bg-gray-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                  </svg>
            </button>
        </form>
    </div>

</div>


@endsection
@section('js')
<script src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript">

    $(document).ready(function (e) {


       $('#image').change(function(){

        let reader = new FileReader();

        reader.onload = (e) => {

          $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

       });

    });

    </script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>

@endsection
