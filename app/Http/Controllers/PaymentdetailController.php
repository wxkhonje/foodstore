<?php

namespace App\Http\Controllers;

use App\Models\Paymentdetail;
use App\Http\Requests\StorePaymentdetailRequest;
use App\Http\Requests\UpdatePaymentdetailRequest;
use App\Http\Resources\PaymentDetailsResource;
use Illuminate\Http\Request;

class PaymentdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (strpos($request->path(), 'api/') === 0) {            
            $paymentDetails = Paymentdetail::all();
            return PaymentDetailsResource::collection($paymentDetails);
        }
        else
        {

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
     * @param  \App\Http\Requests\StorePaymentdetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentdetailRequest $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'payment_method' => 'required',
            'card_number' => 'nullable', // You can adjust validation as needed
            'expirydate' => 'nullable',
            'ussdMNO' => 'nullable',
            'ussdmobilenumber' => 'nullable',
            'delivery_address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
        ]);

        if (strpos($request->path(), 'api/') === 0) {            
            $paymentDetail = Paymentdetail::create($validatedData);
            return new PaymentDetailsResource($paymentDetail);
        }
        else
        {
            $paymentDetail = Paymentdetail::create($validatedData);
            return new PaymentDetailsResource($paymentDetail);
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paymentdetail  $paymentdetail
     * @return \Illuminate\Http\Response
     */
    public function show(Paymentdetail $paymentdetail)
    {
        return new PaymentDetailsResource($paymentdetail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paymentdetail  $paymentdetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymentdetail $paymentdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentdetailRequest  $request
     * @param  \App\Models\Paymentdetail  $paymentdetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentdetailRequest $request, Paymentdetail $paymentdetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paymentdetail  $paymentdetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymentdetail $paymentdetail)
    {
        //
    }
}
