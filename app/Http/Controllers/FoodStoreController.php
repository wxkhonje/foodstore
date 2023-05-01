<?php

namespace App\Http\Controllers;

use App\Models\business;
use App\Models\location;
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
        
        $businesses = business::all();
        $locate = location::all()->toarray();
        return view('foodstorefrontend')->with('businesses',$businesses)->with('location', $locate);
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

        if (strpos($request->path(), 'api/') === 0) {
            return BusinessResource::collection(
                business::all());
        }
        else
        {              
            //$resturants = business::all()->where('category',$request->get('category'));
            $businesses = business::all();
            //$businesses = business::paginate(30)->where('category','DessertShops');
            //$businesses = business::paginate(30);
    
            //return view('foodstorefrontend')->with('business', $business);
            //$resturants = business::where('category','Foodtruck')->get();
            $locate = location::all()->toarray();
            return view('foodstorefrontend')->with('businesses',$businesses)->with('location', $locate);
        }
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
