<?php

namespace App\Http\Controllers;

use App\Models\sitestatistic;
use App\Http\Requests\StoresitestatisticRequest;
use App\Http\Requests\UpdatesitestatisticRequest;

class SitestatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sitestatistics');
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
     * @param  \App\Http\Requests\StoresitestatisticRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresitestatisticRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sitestatistic  $sitestatistic
     * @return \Illuminate\Http\Response
     */
    public function show(sitestatistic $sitestatistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sitestatistic  $sitestatistic
     * @return \Illuminate\Http\Response
     */
    public function edit(sitestatistic $sitestatistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesitestatisticRequest  $request
     * @param  \App\Models\sitestatistic  $sitestatistic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesitestatisticRequest $request, sitestatistic $sitestatistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sitestatistic  $sitestatistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(sitestatistic $sitestatistic)
    {
        //
    }
}
