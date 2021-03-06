<?php

namespace App\Http\Controllers;

use App\Models\business;
use App\Models\Location;
use Illuminate\Http\Request;

class FoodStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resturants = business::all();
        //$locate = location::all();

        //dd($locate);

        /*foreach ($locate as $location)
        {
            dd($location);
        }*/

        $locate = location::all()->toarray();
        return view('foodstorefrontend')->with('resturants',$resturants)->with('location', $locate);
    }

    public function  admin()
    {
        return view('admin.dashboard');
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
        $resturants = business::all()->where('category',$request->get('category'));
        //$resturants = business::paginate(30)->where('category','DessertShops');

        //return view('foodstorefrontend')->with('business', $business);
        //$resturants = business::where('category','Foodtruck')->get();
        $locate = location::all()->toarray();
        return view('foodstorefrontend')->with('resturants',$resturants)->with('location', $locate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
