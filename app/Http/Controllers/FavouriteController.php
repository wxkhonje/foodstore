<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Http\Requests\StoreFavouriteRequest;
use App\Http\Requests\UpdateFavouriteRequest;
use App\Http\Resources\FavouriteResource;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {  
            
            $favourites = Favourite::all();
            return FavouriteResource::collection($favourites);
        }
        else
        {
            $Favourite = Favourite::all();
            return view('customer.favourite')->with('Favourite', $Favourite);
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
     * @param  \App\Http\Requests\StoreFavouriteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavouriteRequest $request)
    {
        if (strpos($request->path(), 'api/') === 0) {  
            
            //Create a New Favourite item
            Favourite::create([
                'user_id'=>$request->user_id,
                'order_id'=>$request->order_id,
                'menu_id'=>$request->menu_id
            ]);   

            $favourites = Favourite::all();
            return FavouriteResource::collection($favourites);
        }
        else
        {
            //Create a New Favourite item
            Favourite::create([
                'user_id'=>$request->user_id,
                'order_id'=>$request->order_id,
                'menu_id'=>$request->menu_id
            ]);

            $Favourite = Favourite::all();
            return view('customer.favourite')->with('Favourite', $Favourite);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavouriteRequest  $request
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavouriteRequest $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favourite $favourite)
    {
        //
    }
}
