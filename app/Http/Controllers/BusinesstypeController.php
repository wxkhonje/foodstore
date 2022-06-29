<?php

namespace App\Http\Controllers;

use App\Models\businesstype;
use App\Http\Requests\StorebusinesstypeRequest;
use App\Http\Requests\UpdatebusinesstypeRequest;

class BusinesstypeController extends Controller
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
     * @param  \App\Http\Requests\StorebusinesstypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebusinesstypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\businesstype  $businesstype
     * @return \Illuminate\Http\Response
     */
    public function show(businesstype $businesstype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\businesstype  $businesstype
     * @return \Illuminate\Http\Response
     */
    public function edit(businesstype $businesstype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebusinesstypeRequest  $request
     * @param  \App\Models\businesstype  $businesstype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebusinesstypeRequest $request, businesstype $businesstype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\businesstype  $businesstype
     * @return \Illuminate\Http\Response
     */
    public function destroy(businesstype $businesstype)
    {
        //
    }
}
