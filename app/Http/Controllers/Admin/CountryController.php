<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Subregion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(8);
        return view('admin.countries.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subregions = Subregion::all();
        $destinations = Destination::orderBy('name')->get();
        return view('admin.countries.create',compact('destinations','subregions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->head->store('country', 'public');
        $country = new Country();
        $country->name = $request->name;
        $country->head = $request->head->hashName();
        $country->slug = Str::slug($request->name);
        $country->destination_id = $request->destination_id;
        $country->subregion_id = $request->subregion_id;
        $country->save();
        return redirect()->route('admin.countries.index')->with('info','Country Created') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('admin.countries.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $destinations = Destination::orderBy('name')->get();
        $subregions = Subregion::all();
        return view('admin.countries.edit',compact('country','destinations','subregions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        if($request->hasFile('head')){
            unlink(storage_path('app/public/country/'.$country->head));
            $request->head->store('country', 'public');
            $country->head = $request->head->hashName();
        }




        $country->name = $request->name;
        $country->slug = Str::slug($request->name);

        $country->destination_id = $request->destination_id;
        $country->subregion_id = $request->subregion_id;
        $country->update();
        return redirect()->route('admin.countries.index')->with('info','Country updated') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        if(file_exists(storage_path('app/public/country/'.$country->head))){
            unlink(storage_path('app/public/country/'.$country->head));

        }
        $country->delete();
        return redirect()->route('admin.countries.index')->with('info','Country Deleted');
    }
}
