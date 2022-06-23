@extends('layouts.admin')
@section('content')
<div class="container mx-auto">
    <div class="w-3/4 p-4 mx-auto mt-5 ">
        <h1 class="mt-5 text-xl text-center font-patua-one"> Create Tag</h1>
        <form action="{{ route('admin.tags.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input id="" type="text" class="w-full p-2 mt-5 border-2 border-blue-500 rounded-lg " name="name" value="" placeholder="Tag name" required  autofocus>
            <div class="w-1/2 h-auto mt-5 p-2 bg-cover">
                <img id="preview-image-before-upload" src="https://cdn.pixabay.com/photo/2022/02/22/17/25/stork-7029266_960_720.jpg"
                alt="preview image" >
            </div>
            <input type="file" name="image" id="image" class="border-2 border-blue-500 mt-5 p-2 w-full rounded-lg">
            <div class="mt-5">
                <textarea name="description" id="description"  cols="30" rows="10">
                    Description
                </textarea>
            </div>
            <button type="submit" value="" class="px-4 py-2 mt-5 text-white bg-gray-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
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
