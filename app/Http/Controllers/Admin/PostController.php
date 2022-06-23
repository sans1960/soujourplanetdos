<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Destination;
use App\Models\Country;
use App\Models\Category;
use App\Models\Subregion;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('date','DESC')->paginate(5);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::all();
        $subregions = Subregion::all();
        // $countries = Country::all();
        $categories = Category::all();
        return view('admin.posts.create',compact('destinations','categories','subregions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->destination_id = $request->destination_id;
        $post->country_id = $request->country_id;
        $post->category_id = $request->category_id;
        $post->subregion_id = $request->subregion_id;
        $post->extract = $request->extract;
        $post->body = $request->body;
        $post->date = $request->date;
        $post->save();
        return redirect()->route('admin.posts.index')->with('info','Post Created') ;






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $destinations = Destination::all();
        // $countries = Country::all();
        $categories = Category::all();
        $subregions = Subregion::all();
        return view('admin.posts.edit',compact('post','destinations','categories','subregions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->destination_id = $request->destination_id;
        $post->country_id = $request->country_id;
        $post->category_id = $request->category_id;
        $post->subregion_id = $request->subregion_id;
        $post->extract = $request->extract;
        $post->body = $request->body;
        $post->date = $request->date;
        $post->update();
        return redirect()->route('admin.posts.index')->with('info','Post updated') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('info','Post Deleted');
    }
    public function getCountries(Request $request){
        $countries = Country::where('destination_id',$request->destination_id)->orderBy('name')->get();
        if (count($countries) > 0) {
            return response()->json($countries);
        }
    }
    public function find(){
        return view('admin.posts.search');
    }
    public function search(Request $request){
        $search = $request->input('search');
        $posts = Post::where('title','LIKE',"%{$search}%")->get();
        return view('admin.posts.search', compact('posts'));
    }
}
