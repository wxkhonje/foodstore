<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Http\Requests\StoreBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {
            return BusinessResource::collection(
                business::all());
        }
        else
        {              
            $locations = location::all();
            $business = business::paginate(2);
            return view('admin.business')->with('business',$business)->with('location',$locations);
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
     * @param  \App\Http\Requests\StoreBusinessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBusinessRequest $request)
    {
        if (strpos($request->path(), 'api/') === 0) {
            //$request->validated($request->all());

            business::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'image_path'=>$request->image_path,
                'category'=>$request->category,
                'contactperson'=>$request->contactperson,  
                'email'=>$request->email,
                'cellnumber'=>$request->cellnumber,  
                'user_id'=>$request->user_id 
          ]);            

            return BusinessResource::collection(
                business::all());
            /*$businesstype = businesstype::create([
                'name' => $request->name,
                'description'=> $request->description
            ]);

            return new BusinessTypeResource($businesstype);*/
        }
        else
        {              
            $request->validated($request->all());

            $business = new business();
        
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/images/';
                $filename = str_replace(' ', '', $file_extension);
                $request->file('image')->move($destination_path, $filename);
    
                $business->image_path = $filename;         
            } 
            else{
                $business->image_path = 'NoImageProvided.jpg';
            }
    
            $business->name = $request->get('name');
            $business->description = $request->get('description');
    
            $business->category = $request->get('category');
            $business->contactperson = $request->get('contactperson');        
            $business->email = $request->get('email');
            $business->cellnumber = $request->get('cellnumber');
    
            $business->save();
    
            $location = new location();
    
            $location->district = $request->get('location');
            $location->PhysicalAddress = $request->get('PhysicalAddress');
            $location->longitude = $request->get('longitude');
            $location->latitude = $request->get('latitude');
            $location->region = 'Southern';
            $location->country = 'Malawi';
            $location->mainlanguage = 'Chichewa';
            $location->facebookhandle = $request->get('facebookhandle');
            $location->instagramhandle = $request->get('instagramhandle');
    
            $business->location()->save($location);
    
            // business::create([
            //     'name'=>$request->get('name'),
            //     'category'=>$request->get('category'),
            //     'location'=>,
            //     'PhysicalAddress'=>,
            //     'longitude'=>,
            //     'latitude'=>,
            //     'contactperson'=>$request->get('contactperson'),
            //     'email'=>$request->get('email'),
            //     'cellnumber'=>$request->get('cellnumber'),
            //     'facebookhandle'=>,
            //     'instagramhandle'=>
            // ]);
    
            $business = business::simplepaginate(6);
            return view('admin.business')->with('business',$business);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBusinessRequest  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBusinessRequest $request, Business $business)
    {
        if (strpos($request->path(), 'api/') === 0) {

            $business->name = $request->name;
            $business->description = $request->description;
            $business->category = $request->category;
            $business->contactperson = $request->contactperson;
            $business->email = $request->email;
            $business->cellnumber = $request->cellnumber;

            $business->save();

            return new BusinessResource($business);
        }
        else
        {              
            $business = business::paginate(15);
            return view('admin.business')->with('business',$business);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        //
    }
}
