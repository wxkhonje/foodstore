<?php

namespace App\Http\Controllers;

use App\Models\businesstype;
use Illuminate\Http\Request;
use App\Http\Requests\StorebusinesstypeRequest;
use App\Http\Requests\UpdatebusinesstypeRequest;
use App\Http\Resources\BusinessTypeResource;

class BusinesstypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {
            return BusinessTypeResource::collection(
                businesstype::all());
        }
        else
        {              
            $businesstype = businesstype::paginate(10);
            return view('admin.school', compact('businesstype'));
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
     * @param  \App\Http\Requests\StorebusinesstypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebusinesstypeRequest $request)
    {
        if (strpos($request->path(), 'api/') === 0) {
            $request->validated($request->all());

            $businesstype = businesstype::create([
                'name' => $request->name,
                'description'=> $request->description
            ]);

            return new BusinessTypeResource($businesstype);
        }
        else
        {              
            //$businesstype = businesstype::paginate(10);
            //return view('admin.businesstype', compact('businesstype'));
        }
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
