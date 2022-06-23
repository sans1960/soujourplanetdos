<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Subregion;
use Illuminate\Support\Str;

class SubregionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subregions = Subregion::paginate(8);
         return view('admin.subregions.index',compact('subregions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::all();
        return view('admin.subregions.create',compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subregion = new Subregion();
        $subregion->name = $request->name;
        $subregion->slug = Str::slug($request->name);
        $subregion->destination_id = $request->destination_id;
        $subregion->save();
        return redirect()->route('admin.subregions.index')->with('info','Subregion Created') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.subregions.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subregion $subregion)
    {
        $destinations = Destination::all();
        return view('admin.subregions.edit',compact('subregion','destinations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subregion $subregion)
    {
        $subregion->name = $request->name;
        $subregion->slug = Str::slug($request->name);
        $subregion->destination_id = $request->destination_id;
        $subregion->update();
        return redirect()->route('admin.subregions.index')->with('info','Subregion Updated') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subregion $subregion)
    {
        $subregion->delete();
        return redirect()->route('admin.subregions.index')->with('info','Subregion Deleted');
    }
}
