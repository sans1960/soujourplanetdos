<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->image->store('tags', 'public');
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->image = $request->image->hashName();
        $tag->slug = Str::slug($request->name);
        $tag->description = $request->description;

        $tag->save();
        return redirect()->route('admin.tags.index')->with('info','Tag Created') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.tags.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        if($request->hasFile('image')){
            unlink(storage_path('app/public/tags/'.$tag->image));
            $request->image->store('tags', 'public');
            $tag->image = $request->image->hashName();
        }
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->description = $request->description;
        $tag->update();
        return redirect()->route('admin.tags.index')->with('info','Tag Updated') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if(file_exists(storage_path('app/public/tags/'.$tag->image))){
            unlink(storage_path('app/public/tags/'.$tag->image));

        }
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info','Tag Deleted');
    }
}
