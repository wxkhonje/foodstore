<?php

namespace App\Http\Controllers;

use App\Models\ingredient;
use App\Http\Requests\StoreingredientRequest;
use App\Http\Requests\UpdateingredientRequest;

class IngredientController extends Controller
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
     * @param  \App\Http\Requests\StoreingredientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreingredientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateingredientRequest  $request
     * @param  \App\Models\ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateingredientRequest $request, ingredient $ingredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(ingredient $ingredient)
    {
        //
    }
}
