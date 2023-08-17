<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\business;
use App\Http\Resources\MenuResource;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {  
            
            $menu = Menu::all();
            return MenuResource::collection($menu);
        }
        else
        {
            $menu = Menu::all();
            return view('resturant.menu')->with('Menus', $menu);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Menu $menu)
    {

        $menu->load('reviews');
        
        if (strpos($request->path(), 'api/') === 0) {  
            
            return new MenuResource($menu);            
        }
        else
        {
            $menu = Menu::all();
            return view('resturant.menu')->with('Menus', $menu);
        }
    }


    public function ProductToOrder(Request $request, $id)
    {
        $menu = Menu::FindorFail($id);
        //$menu->load('reviews');
        
        if (strpos($request->path(), 'api/') === 0) {  
            
            return new MenuResource($menu);            
        }
        else
        {
            $menu = Menu::all();
            return view('resturant.menu')->with('Menus', $menu);
        }
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

    public function ShowBusinessesMenus(Request $request, $businessid)
    {
        if (strpos($request->path(), 'api/') === 0) {  
            
            $menu = Menu::where('business_id', $businessid)->get();
            return MenuResource::collection($menu);
        }
        else
        {
            $menu = Menu::all();
            return view('resturant.menu')->with('Menus', $menu);
        }  
    }
}
