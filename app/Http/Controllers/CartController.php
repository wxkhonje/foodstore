<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Http\Requests\StorecartRequest;
use App\Http\Requests\UpdatecartRequest;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {     
            $carts = cart::all();       
            return CartResource::collection($carts);
        }
        else
        {
            //$order = order::find($id);
            $carts = cart::with(['user', 'menu','order'])
            ->where('order_id', '=', $request->id)->get();

            return view('resturant.carts', compact('carts'));
            /*$carts = cart::all();
            dd($carts);*/
            //return CartResource::collection($carts);
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
     * @param  \App\Http\Requests\StorecartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecartRequest $request)
    {
        $cart = new Cart();
        $cart->user_id = $request->input('user_id');
        $cart->session_id = $request->input('session_id');
        $cart->menu_id = $request->input('menu_id');
        $cart->quantity = $request->input('quantity');
        $cart->price = $request->input('price');
        $cart->save();

        return new CartResource($cart);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, cart $cart)
    {
        if (strpos($request->path(), 'api/') === 0) {     
            $carts = cart::all();       
            return CartResource::collection($carts);
        }
        else
        {
            //$order = order::find($id);
            $cart = cart::with(['user', 'menu','order'])
            ->where('id', '=', $cart->id)->get();

            $cartedit = $cart[0];

            return view('resturant.editcart', compact('cartedit'));
            //$carts = cart::all();
            //dd($cartedit);
            //return CartResource::collection($carts);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecartRequest  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecartRequest $request, cart $cart)
    {
        $cart = Cart::findOrFail($id);

        $cart->user_id = $request->input('user_id');
        $cart->session_id = $request->input('session_id');
        $cart->product_id = $request->input('product_id');
        $cart->quantity = $request->input('quantity');
        $cart->price = $request->input('price');
        $cart->save();

        return new CartResource($cart);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        //
    }
}
