@extends('layouts.admin')
@section('content')
<div class="container mx-auto">
    @if (session('info'))
    <div class="flex items-center px-4 py-3 text-sm font-bold text-white bg-blue-500" role="alert">
        <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{ session('info') }}</p>
      </div>


@endif
</div>
<div class="container flex flex-row items-center justify-between p-4 mx-auto mt-5 border-b-4">
    <h1 class="text-2xl">All Posts</h1>
    <a href="{{ route('admin.posts.create') }}" class="px-6 py-2 text-white bg-gray-700 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg> </a>


</div>
    <div class="container mx-auto">

            <table class="block min-w-full border-collapse md:table">
                <thead class="block md:table-header-group">
                    <tr class="absolute block border border-grey-500 md:border-none md:table-row -top-full md:top-auto -left-full md:left-auto md:relative ">
                        <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Title</th>
                        <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell"> Destination</th>
                         <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell"> Subregion</th>
                        <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Country</th>
                        <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Category</th>
                        <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Date</th>

                        <th colspan="2" class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Actions</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @foreach ($posts as $post)
                        <tr>
                            <td class="block p-2 text-left md:border md:border-grey-500 md:table-cell">{{ $post->title }}</td>
                            <td class="block p-2 text-left md:border md:border-grey-500 md:table-cell">{{  $post->destination->name }}</td>
                            <td class="block p-2 text-left md:border md:border-grey-500 md:table-cell">{{  $post->subregion->name }}</td>
                            <td class="block p-2 text-left md:border md:border-grey-500 md:table-cell">{{  $post->country->name }}</td>
                            <td class="block p-2 text-left md:border md:border-grey-500 md:table-cell">{{  $post->category->name }}</td>
                            <td class="block p-2 text-left md:border md:border-grey-500 md:table-cell">{{  \Carbon\Carbon::parse($post->date)->format('d-m-Y') }}</td>
                            <td>
                                <a class="" href="{{ route('admin.posts.edit',$post) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                      </svg>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.posts.destroy',$post) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="show_confirm" type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg></button>
                              </form>
                            </td>
                            </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="mt-6">
                {!! $posts->links() !!}
            </div>
        </div>









@endsection
@section('js')
<script src="{{ asset('js/jquery.js') }}"></script>

<script src="{{ asset('js/sweetalert2.js') }}"></script>


<script type="text/javascript">



     $('.show_confirm').click(function(event) {

          var form =  $(this).closest("form");

          var name = $(this).data("name");

          event.preventDefault();

          swal({

              title: `Are you sure you want to delete this record?`,

              text: "If you delete this, it will be gone forever.",

              icon: "warning",

              buttons: true,

              dangerMode: true,

          })

          .then((willDelete) => {

            if (willDelete) {

              form.submit();

            }

          });

      });



</script>
@endsection
