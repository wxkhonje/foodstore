<?php

namespace App\Http\Controllers;

use App\Models\business;
use App\Models\location;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = location::all();
        $business = business::paginate(2);
        return view('admin.business')->with('business',$business)->with('location',$locations);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        business::create([
            'name'=>$request->get('name'),
            'category'=>$request->get('category'),
            'location'=>$request->get('location'),
            'PhysicalAddress'=>$request->get('PhysicalAddress'),
            'longitude'=>$request->get('longitude'),
            'latitude'=>$request->get('latitude'),
            'contactperson'=>$request->get('contactperson'),
            'email'=>$request->get('email'),
            'cellnumber'=>$request->get('cellnumber'),
            'facebookhandle'=>$request->get('facebookhandle'),
            'instagramhandle'=>$request->get('instagramhandle')
        ]);

        $business = business::simplepaginate(6);
        return view('admin.business')->with('business',$business);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
