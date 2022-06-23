<?php

namespace App\Http\Controllers;
use App\Models\Destination;
use App\Models\Post;
use App\Models\Country;
use App\Models\Category;

use App\Models\Photo;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {



        $posts = Post::orderBy('date','DESC')->paginate(12);

        return view('welcome', compact('posts'));
    }

    public function postsdestination(Destination $destination)
    {

        $categories = Category::orderBy('name')->get();
        $countries = Country::where('destination_id', $destination->id)->orderBy('name')->get();
        $posts = Post::where('destination_id', $destination->id)->orderBy('date','DESC')->paginate(12);


        return view('posts.destination', compact('posts', 'destination', 'countries',  'categories'));
    }
    public function postsDestCat(Destination $destination, Category $category)
    {
        $categories = Category::orderBy('name')->get();

        $posts = Post::where('destination_id', $destination->id)->where('category_id', $category->id)->orderBy('date','DESC')->paginate(12);
        return view('posts.destcat', compact('posts',  'destination', 'category', 'categories'));
    }
    public function viewpost(Post $post)
    {

        $posts= Post::where('country_id',$post->country_id)->where('id','<>',$post->id)->take(8)->get();
        if(count($posts)>5){
            $posts= Post::where('country_id',$post->country_id)->where('id','<>',$post->id)->take(8)->get();
        }else{
            $posts= Post::where('subregion_id',$post->subregion_id)->where('id','<>',$post->id)->take(8)->get();
            if(count($posts)>5){
                $posts= Post::where('subregion_id',$post->subregion_id)->where('id','<>',$post->id)->take(8)->get();
            }else{
                $posts= Post::where('destination_id',$post->destination_id)->where('id','<>',$post->id)->take(8)->get();
            }
        }



        return view('posts.post', compact('post','posts'));
    }
    public function postscountries(Country $country)
    {

        $categories = Category::orderBy('name')->get();
        $posts = Post::where('country_id', $country->id)->orderBy('date','DESC')->paginate(12);
        return view('posts.countries', compact('posts', 'country','categories'));
    }
    public function postscategory(Category $category)
    {

        $categories = Category::orderBy('name')->get();

        $posts = Post::where('category_id', $category->id)->orderBy('date','DESC')->paginate(12);
        return view('posts.categories', compact('posts', 'category', 'categories'));
    }
    public function postscountcat(Country $country,Category $category){
        $categories = Category::orderBy('name')->get();
        $posts = Post::where('country_id',$country->id)->where('category_id',$category->id)->orderBy('date','DESC')->paginate(12);
        return view('posts.countcat',compact('posts','categories','country','category'));

    }

}

