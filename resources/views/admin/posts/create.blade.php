@extends('layouts.admin')
@section('content')
<div class="container mx-auto">
    <div class="w-full p-4 mx-auto mt-5 ">
        <h1 class="mt-5 text-xl text-center font-patua-one"> Create Post</h1>
        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            <input id="" type="text" class="w-full p-2 mt-5 border-2 border-blue-500 rounded-lg " name="title" value="" placeholder=" Post title" required  autofocus>
            <div class="grid grid-cols-4 gap-4 mt-5">
                <div>


                    <select class="w-full p-2 border-2 border-blue-500 rounded-lg" name="destination_id" id="dest">
                        <option>Choose Destination</option>
                        @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                        @endforeach
                    </select>



                </div>
                <div>
                    <select class="w-full p-2 border-2 border-blue-500 rounded-lg" name="country_id" id="country"></select>
                </div>
                <div>
                    <select class="w-full p-2 border-2 border-blue-500 rounded-lg" name="category_id" id="">
                        <option selected>Choose Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div>


                    <select class="w-full p-2 border-2 border-blue-500 rounded-lg" name="subregion_id" >
                        <option>Choose Subregion</option>
                        @foreach ($subregions as $subregion)
                            <option value="{{ $subregion->id }}">{{ $subregion->name }}</option>
                        @endforeach
                    </select>



                </div>
            </div>
            <div class="mt-5">
                <textarea name="extract" id="extract"  cols="30" rows="10">
                    Extract
                </textarea>
            </div>
            <div class="mt-5">
                <textarea name="body" id="body" placeholder="Body" cols="30" rows="10">
                    Body
                </textarea>
            </div>
            <div>

            <input type="date" name="date" id="" class="p-2 mt-5 border-blue-500 rounded-lg ">
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
<script>
    $(document).ready(function(){
        $('#dest').on('change',function(){
            var destId = this.value;
            $('#country').html('');
            $.ajax({
                url:'{{ route('getcountries') }}?destination_id='+destId,
                type:'get',
                success:function (res){
                    $('#country').html('<option value="">Select countries</option>');
                    $.each(res,function(key,value){
                        $('#country').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });

</script>
<script>
  CKEDITOR.replace( 'extract' );
  CKEDITOR.replace( 'body' );
</script>


@endsection
