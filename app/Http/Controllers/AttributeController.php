<?php

namespace App\Http\Controllers;

use App\Models\attribute;
use App\Http\Requests\StoreattributeRequest;
use App\Http\Requests\UpdateattributeRequest;
use App\Http\Resources\attributesResource;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {
            return attributesResource::collection(
                $attributes = attribute::all()
            );
        }
        else
        {              
            $attributes = attribute::all();
            return view('admin.attributes')->with('attributes',$attributes);
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
     * @param  \App\Http\Requests\StoreattributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreattributeRequest $request)
    {
        if (strpos($request->path(), 'api/') === 0) {

            $request->validated($request->all());
            attribute::create([
                'name'=>$request->name,
                'data_type'=>$request->data_type  
            ]);   

            return attributesResource::collection(
                $attribute = attribute::all()
            );
        }
        else
        {              
            $attributes = attribute::all();
            return view('admin.attributes')->with('attributes',$attributes);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(attribute $attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateattributeRequest  $request
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateattributeRequest $request, attribute $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(attribute $attribute)
    {
        //
    }
}
