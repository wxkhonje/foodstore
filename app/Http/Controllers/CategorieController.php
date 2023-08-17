<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Http\Requests\StorecategorieRequest;
use App\Http\Requests\UpdatecategorieRequest;
use App\Http\Resources\categoryResource;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {
            return categoryResource::collection(
                $categories = categorie::all()
            );
        }
        else
        {              
            $categories = categorie::all();
            return view('admin.businesscategory')->with('categories',$categories);
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
     * @param  \App\Http\Requests\StorecategorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategorieRequest $request)
    {
        if (strpos($request->path(), 'api/') === 0) {

            $request->validated($request->all());

            categorie::create([
                'name'=>$request->name,
                'description'=>$request->description
            ]);           

            return categoryResource::collection(
                $categories = categorie::all()
            );
        }
        else
        {              
            $request->validated($request->all());
            
            categorie::create([
                'name'=>$request->name,
                'description'=>$request->description
            ]);              

            $categories = categorie::all();
            return view('admin.businesscategory')->with('categories',$categories);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategorieRequest  $request
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategorieRequest $request, categorie $categorie)
    {

        if (strpos($request->path(), 'api/') === 0) {

            $request->validated($request->all());

            $categorie->name = $request->name;
            $categorie->save();         

            return categoryResource::collection(
                $categories = categorie::all()
            );
        }
        else
        {              
            $request->validated($request->all());

            $categorie->name = $request->name;
            $categorie->save();           

            $categories = categorie::all();
            return view('admin.businesscategory')->with('categories',$categories);
        }


        return new IncidentResource($incident);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie $categorie)
    {
        //
    }
}
