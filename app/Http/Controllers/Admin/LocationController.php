<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Post;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::paginate(8);
        return view('admin.locations.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all()->sortByDesc('date');

        return view('admin.locations.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location();
        $location->latitud = $request->latitud;
        $location->longitud = $request->longitud;

        $location->zoom = $request->zoom;
        $location->post_id = $request->post_id;
        $location->save();
        return redirect()->route('admin.locations.index')->with('info','Location Created') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('admin.locations.show',compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $posts = Post::all()->sortByDesc('date');
        return view('admin.locations.edit',compact('location','posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $location->latitud = $request->latitud;
        $location->longitud = $request->longitud;

        $location->zoom = $request->zoom;
        $location->post_id = $request->post_id;
        $location->update();
        return redirect()->route('admin.locations.index')->with('info','Location Updated') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('admin.locations.index')->with('info','Location Deleted');
    }
}
