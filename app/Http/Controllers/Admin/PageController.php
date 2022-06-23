<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tag;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.pages.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->image->store('pages', 'public');
        $page = new Page();
        $page->name = $request->name;
        $page->image = $request->image->hashName();
        $page->slug = Str::slug($request->name);
        $page->description = $request->description;
        $page->caption = $request->caption;
        $page->date = $request->date;
        $page->tag_id = $request->tag_id;
        $page->save();
        return redirect()->route('admin.pages.index')->with('info','Page Created') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.pages.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $tags = Tag::all();
        return view('admin.pages.edit',compact('page','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        if($request->hasFile('image')){
            unlink(storage_path('app/public/pages/'.$page->image));
            $request->image->store('pages', 'public');
            $page->image = $request->image->hashName();
        }
        $page->name = $request->name;
        $page->slug = Str::slug($request->name);
        $page->description = $request->description;
        $page->caption = $request->caption;
        $page->date = $request->date;
        $page->tag_id = $request->tag_id;
        $page->update();
        return redirect()->route('admin.pages.index')->with('info','Page Updated') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {

        if(file_exists(storage_path('app/public/pages/'.$page->image))){
            unlink(storage_path('app/public/pages/'.$page->image));

        }
        $page->delete();
        return redirect()->route('admin.pages.index')->with('info','Page Deleted');
    }
}
