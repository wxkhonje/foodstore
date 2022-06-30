<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\business;

class FoodmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = business::pluck('name','id');

        $Menus = Menu::all();
        return view('admin.foodmenu')->with('Menus',$Menus)->with('businesses', $business);
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalName();
            $destination_path = public_path() . '/images/';
            $filename = str_replace(' ', '', $file_extension);
            $request->file('image')->move($destination_path, $filename);

            $business = business::find($request->get('business_id'));
            $menu = new Menu();
            
            $menu->name = $request->get('menuname');
            $menu->description = $request->get('description');
            $menu->price = $request->get('price');
            $menu->image_path = $filename;
    
            $business->menu()->save($menu);            
        }        

        //$newImageName = time() . '-' . $request->get('menuname'). '-' . 
        //                $request->get('business_id') . '.' . $request->image->extension();
    

        $business = business::pluck('name','id');
        $Menus = Menu::all();
        return view('admin.foodmenu')->with('Menus',$Menus)->with('businesses', $business);   
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
        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->store('public/images');

        $request->validate([
            'menuname'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=> 'required|mimes:jpg,png,jpeg|max:5048'

        ]);        


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
