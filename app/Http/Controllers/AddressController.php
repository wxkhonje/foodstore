<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Http\Requests\StoreaddressRequest;
use App\Http\Requests\UpdateaddressRequest;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {
            return AddressResource::collection(
                $addresses = Address::all()              
            );
        }
        else
        {              
            $addresses = Address::all();
            return view('admin.useraddress')->with('addresses',$addresses);
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
     * @param  \App\Http\Requests\StoreaddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreaddressRequest $request)
    {
        if (strpos($request->path(), 'api/') === 0) {

            $request->validated($request->all());
            Address::create([
                'user_id'=>$request->user_id,
                'street_address'=>$request->street_address,
                'apartment_suite_number'=>$request->apartment_suite_number,
                'city'=>$request->city,
                'state_province'=>$request->state_province,
                'postal_code'=>$request->postal_code,
                'country'=>$request->country,
                'delivery_instructions'=>$request->delivery_instructions,
                'address_type'=>$request->address_type  
            ]);          

            return AddressResource::collection(
                $addresses = Address::all()
            );
        }
        else
        {            
            
            $request->validated($request->all());
            attribute::create([
                'user_id'=>$request->user_id,
                'street_address'=>$request->street_address,
                'apartment_suite_number'=>$request->apartment_suite_number,
                'city'=>$request->city,
                'state_province'=>$request->state_province,
                'postal_code'=>$request->postal_code,
                'country'=>$request->country,
                'delivery_instructions'=>$request->delivery_instructions,
                'address_type'=>$request->address_type   
            ]);            
            
            $addresses = Address::all();
            return view('admin.useraddress')->with('addresses',$addresses);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaddressRequest  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateaddressRequest $request, address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(address $address)
    {
        //
    }
}
