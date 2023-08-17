<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\categorie;
use App\Models\location;
use App\Models\Businessaddress;
use App\Http\Requests\StoreBusinessaddressRequest;
use App\Http\Requests\UpdateBusinessaddressRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BusinessaddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::id();

        if (strpos($request->path(), 'api/') === 0) {            
            return BusinessResource::collection(
                Business::where('user_id', $userId)->get());
        }
        else
        {
            $businessaddresses = Businessaddress::all();

            $business = Business::where('user_id', $userId)->paginate(5);
            $categories = categorie::all();

            $businessoptions = [];
            foreach ($business as $option) {
                $businessoptions[$option->id] = $option->name;
            }            

            $categoryoptions = [];
            foreach ($categories as $option) {
                $categoryoptions[$option->id] = $option->name;
            }

            return view('admin.businessaddress', compact('businessoptions', 'categoryoptions', 'businessaddresses'));
        }
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
     * @param  \App\Http\Requests\StoreBusinessaddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBusinessaddressRequest $request)
    {
        //$businessaddress->district = $request->get('PostAddress');

        $Business = Business::find(1);
        $businessaddress = new Businessaddress();
        
        $businessaddress->PostAddress = $request->get('postalAddress');
        $businessaddress->PhysicalAddress = $request->get('physicalAddress');
        $businessaddress->longitude = $request->get('longitude');
        $businessaddress->latitude = $request->get('latitude');
        $businessaddress->region = $request->get('region');
        $businessaddress->district = $request->get('district');
        $businessaddress->country = $request->get('country');
        $businessaddress->mainlanguage = $request->get('mainlanguage');
        $businessaddress->Street = $request->get('Street');
        $businessaddress->googlepin = $request->get('googlepin');
        $businessaddress->instagramhandle = $request->get('instagramhandle');
        $businessaddress->facebookhandle = $request->get('facebookhandle');
        
        $Business->businessAddress()->save($businessaddress);

        $userId = Auth::id();

        $businessaddresses = Businessaddress::all();

        $business = Business::where('user_id', $userId)->paginate(5);
        $categories = categorie::all();

        $businessoptions = [];
        foreach ($business as $option) {
            $businessoptions[$option->id] = $option->name;
        }            

        $categoryoptions = [];
        foreach ($categories as $option) {
            $categoryoptions[$option->id] = $option->name;
        }

        return view('admin.businessaddress', compact('businessoptions', 'categoryoptions', 'businessaddresses'));        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Businessaddress  $businessaddress
     * @return \Illuminate\Http\Response
     */
    public function show(Businessaddress $businessaddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Businessaddress  $businessaddress
     * @return \Illuminate\Http\Response
     */
    public function edit(Businessaddress $businessaddress, Request $request)
    {
        $userId = Auth::id();
        if (strpos($request->path(), 'api/') === 0) {            
            return BusinessResource::collection(
                Business::where('user_id', $userId)->get());
        }
        else
        {
            
            //return redirect()->route('businessaddress.edit');
            //return View::make('admin.businessAddressEdit')->withLayout('layouts.backend')->with('businessoptions', $businessoptions)->with('categoryoptions', $categoryoptions)->with('businessaddresses', $businessaddresses);
           return view('admin.businessAddressEdit', compact('businessaddress'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBusinessaddressRequest  $request
     * @param  \App\Models\Businessaddress  $businessaddress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBusinessaddressRequest $request, Businessaddress $businessaddress)
    {
        $userId = Auth::id();
        if (strpos($request->path(), 'api/') === 0) {            
            return BusinessResource::collection(
                Business::where('user_id', $userId)->get());
        }
        else
        {
           // dd($request);
            $businessaddress->PostAddress = $request->get('PostAddress');
            $businessaddress->PhysicalAddress = $request->get('PhysicalAddress');
            $businessaddress->longitude = $request->get('longitude');
            $businessaddress->latitude = $request->get('latitude');
            $businessaddress->region = $request->get('region');
            $businessaddress->district = $request->get('district');
            $businessaddress->country = $request->get('country');
            $businessaddress->mainlanguage = $request->get('mainlanguage');
            $businessaddress->Street = $request->get('Street');
            $businessaddress->googlepin = $request->get('googlepin');
            $businessaddress->instagramhandle = $request->get('instagramhandle');
            $businessaddress->facebookhandle = $request->get('facebookhandle');

            $businessaddress->save();
            //return redirect()->route('businessaddress.edit');
            //return View::make('admin.businessAddressEdit')->withLayout('layouts.backend')->with('businessoptions', $businessoptions)->with('categoryoptions', $categoryoptions)->with('businessaddresses', $businessaddresses);
            $userId = Auth::id();

            $businessaddresses = Businessaddress::all();
    
            $business = Business::where('user_id', $userId)->paginate(5);
            $categories = categorie::all();
    
            $businessoptions = [];
            foreach ($business as $option) {
                $businessoptions[$option->id] = $option->name;
            }            
    
            $categoryoptions = [];
            foreach ($categories as $option) {
                $categoryoptions[$option->id] = $option->name;
            }
    
            //Alert::success('Success', 'Update completed successfully')->showConfirmButton();

            return view('admin.businessaddress', compact('businessoptions', 'categoryoptions', 'businessaddresses'));
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Businessaddress  $businessaddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Businessaddress $businessaddress)
    {
        //
    }
}
