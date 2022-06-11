<?php

namespace App\Http\Controllers;

use App\Models\location;
use App\Http\Requests\StorelocationRequest;
use App\Http\Requests\UpdatelocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = location::paginate(10);
        return view('admin.location')->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelocationRequest $request)
    {
        location::create(
            [   'district'=>$request->get('district'),
                'region'=>$request->get('region'),
                'country'=>$request->get('country'),
                'mainlanguage'=>$request->get('mainlanguage')
            ]
        );
        $locations = location::paginate(10);
        return view('admin.location')->with('locations', $locations);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelocationRequest  $request
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelocationRequest $request, location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(location $location)
    {
        //
    }
}
