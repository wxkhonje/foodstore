<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            // Create a new Customer instance
            $customer = new Customer();

            $customer->firstname = $request->input('firstname');
            $customer->middlename = $request->input('middlename');
            $customer->lastname = $request->input('lastname');
            $customer->cellnumber = $request->input('cellnumber');
            $customer->telephonenumber = $request->input('telephonenumber');
            $customer->emailaddress = $request->input('emailaddress');
            $customer->physicaladdress = $request->input('physicaladdress');
            $customer->contactaddress = $request->input('contactaddress');
            $customer->longitude = $request->input('longitude');
            $customer->latitude = $request->input('latitude');
            $customer->deliveryaddress = $request->input('deliveryaddress');
            $customer->notes = $request->input('notes');
    
            // Save the order
            $customer->save();    
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
