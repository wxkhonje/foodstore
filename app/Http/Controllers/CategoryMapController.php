<?php

namespace App\Http\Controllers;

use App\Models\category_map;
use App\Http\Requests\Storecategory_mapRequest;
use App\Http\Requests\Updatecategory_mapRequest;

class CategoryMapController extends Controller
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
     * @param  \App\Http\Requests\Storecategory_mapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecategory_mapRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category_map  $category_map
     * @return \Illuminate\Http\Response
     */
    public function show(category_map $category_map)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category_map  $category_map
     * @return \Illuminate\Http\Response
     */
    public function edit(category_map $category_map)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecategory_mapRequest  $request
     * @param  \App\Models\category_map  $category_map
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecategory_mapRequest $request, category_map $category_map)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category_map  $category_map
     * @return \Illuminate\Http\Response
     */
    public function destroy(category_map $category_map)
    {
        //
    }
}
