<?php

namespace App\Http\Controllers;

use App\Models\email;
use App\Http\Requests\StoreemailRequest;
use App\Http\Requests\UpdateemailRequest;
use \Illuminate\Support\Facades\Mail;
use App\Mail\welcomemail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Mail::to('xavier.khonje@gmail.com')->send(new welcomemail());
        return new welcomemail();
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
     * @param  \App\Http\Requests\StoreemailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreemailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateemailRequest  $request
     * @param  \App\Models\email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateemailRequest $request, email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(email $email)
    {
        //
    }
}
