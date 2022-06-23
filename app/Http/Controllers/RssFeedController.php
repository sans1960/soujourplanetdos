<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class RssFeedController extends Controller
{
    public function rssEurope(){
        $posts = Post::where('destination_id',1)->orderBy('date','DESC')->get();
        return response()->view('feed.europe',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssCaribbean(){
        $posts = Post::where('destination_id',2)->orderBy('date','DESC')->get();
        return response()->view('feed.caribbean',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssOceania(){
        $posts = Post::where('destination_id',3)->orderBy('date','DESC')->get();
        return response()->view('feed.oceania',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssSouthAsia(){
        $posts = Post::where('destination_id',4)->orderBy('date','DESC')->get();
        return response()->view('feed.southasia',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssSouthAmerica(){
        $posts = Post::where('destination_id',5)->orderBy('date','DESC')->get();
        return response()->view('feed.southamerica',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssSubsaharan(){
        $posts = Post::where('destination_id',6)->orderBy('date','DESC')->get();
        return response()->view('feed.subsaharan',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssMaghreb(){
        $posts = Post::where('destination_id',7)->orderBy('date','DESC')->get();
        return response()->view('feed.maghreb',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssNorthEastAsia(){
        $posts = Post::where('destination_id',8)->orderBy('date','DESC')->get();
        return response()->view('feed.northeastasia',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssSouthEastAsia(){
        $posts = Post::where('destination_id',9)->orderBy('date','DESC')->get();
        return response()->view('feed.southeastasia',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssCentralAsia(){
        $posts = Post::where('destination_id',10)->orderBy('date','DESC')->get();
        return response()->view('feed.centralasia',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssCentralAmerica(){
        $posts = Post::where('destination_id',11)->orderBy('date','DESC')->get();
        return response()->view('feed.centralamerica',compact('posts'))->header('Content-Type','application/xml');
    }
    public function rssGeneral(){
        $posts = Post::all()->sortByDesc('date');
        return response()->view('feed.general',compact('posts'))->header('Content-Type','application/xml');
    }


}
