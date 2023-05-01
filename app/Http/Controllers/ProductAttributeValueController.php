<?php

namespace App\Http\Controllers;

use App\Models\product_attribute_value;
use App\Http\Requests\Storeproduct_attribute_valueRequest;
use App\Http\Requests\Updateproduct_attribute_valueRequest;
use Illuminate\Http\Request;
use App\Http\Resources\ProductAttributeValueResource;


class ProductAttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {
            return ProductAttributeValueResource::collection(
                $product_attribute_value = product_attribute_value::all()
            );
        }
        else
        {              
            $product_attribute_value = product_attribute_value::all();
            return view('admin.productAV')->with('productattributevalue',$product_attribute_value);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeproduct_attribute_valueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeproduct_attribute_valueRequest $request)
    {
        if (strpos($request->path(), 'api/') === 0) {

            $request->validated($request->all());
            product_attribute_value::create([
                'product_id'=>$request->product_id,
                'attribute_id'=>$request->attribute_id ,
                'value'=>$request->value  
            ]);   

            return ProductAttributeValueResource::collection(
                $product_attribute_value = product_attribute_value::all()
            );
        }
        else
        {              
            $product_attribute_value = product_attribute_value::all();
            return view('admin.productAV')->with('productattributevalue',$product_attribute_value);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_attribute_value  $product_attribute_value
     * @return \Illuminate\Http\Response
     */
    public function show(product_attribute_value $product_attribute_value)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_attribute_value  $product_attribute_value
     * @return \Illuminate\Http\Response
     */
    public function edit(product_attribute_value $product_attribute_value)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateproduct_attribute_valueRequest  $request
     * @param  \App\Models\product_attribute_value  $product_attribute_value
     * @return \Illuminate\Http\Response
     */
    public function update(Updateproduct_attribute_valueRequest $request, product_attribute_value $product_attribute_value)
    {
        if (strpos($request->path(), 'api/') === 0) {

            $request->validated($request->all());

            $product_attribute_value->product_id = $request->product_id;
            $product_attribute_value->attribute_id = $request->attribute_id;
            $product_attribute_value->value = $request->value;
            $product_attribute_value->save();         

            return ProductAttributeValueResource::collection(
                $product_attribute_value = product_attribute_value::all()
            );
        }
        else
        {              
            $request->validated($request->all());    

            $product_attribute_value->product_id = $request->product_id;
            $product_attribute_value->attribute_id = $request->attribute_id;
            $product_attribute_value->value = $request->value;
            $product_attribute_value->save();        

            $product_attribute_value = product_attribute_value::all();
            return view('productav')->with('productattributevalue',$product_attribute_value);
        }


        return new ProductAttributeValueResource($productattributevalue);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_attribute_value  $product_attribute_value
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_attribute_value $product_attribute_value)
    {
        //
    }
}
