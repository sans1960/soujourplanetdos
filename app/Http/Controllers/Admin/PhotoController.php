<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Support\Facades\Storage;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::paginate(5);
        return view('admin.photos.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all()->sortByDesc('date');
        return view('admin.photos.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->image->store('photos', 'public');
        $photo = new Photo([
            "caption" => $request->get('caption'),
            "image" => $request->image->hashName(),
            "post_id"=>$request->get('post_id')
        ]);
        $photo->save(); // Finally, save the record.
        return redirect()->route('admin.photos.index')->with('info','Photo Created') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('admin.photos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $posts = Post::all()->sortByDesc('date');
        return view('admin.photos.edit',compact('posts','photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        if($request->hasFile('image')){
            unlink(storage_path('app/public/photos/'.$photo->image));
            $request->image->store('photos', 'public');
            $photo->image = $request->image->hashName();
        }
        $photo->post_id = $request->post_id;
        $photo->caption = $request->caption;
        $photo->update();
        return redirect()->route('admin.photos.index')->with('info','Photo Updated') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        if(file_exists(storage_path('app/public/photos'.$photo->image))){
            unlink(storage_path('app/public/photos/'.$photo->image));

        }
        $photo->delete();
        return redirect()->route('admin.photos.index')->with('info','Photo Deleted');
    }
}
