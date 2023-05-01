<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {
            return ProductResource::collection(
                $products = Product::all()
            );
        }
        else
        {              
            $products = Product::all();
            return view('admin.product')->with('products',$products);
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if (strpos($request->path(), 'api/') === 0) {

            $request->validated($request->all());
            Product::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'price'=>$request->price,
                'category_id'=>$request->category_id    
            ]);   

            return ProductResource::collection(
                $products = Product::all()
            );
        }
        else
        {              
            $products = Product::all();
            return view('admin.product')->with('products',$products);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if (strpos($request->path(), 'api/') === 0) {

            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category_id;

            $categorie->save();       

            return ProductResource::collection(
                $products = Product::all()
            );
        }
        else
        {              
            $products = Product::all();
            return view('admin.product')->with('products',$products);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
