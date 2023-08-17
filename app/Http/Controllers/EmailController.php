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
        //Mail::to('xavier.khonje@gmail.com')->send(new welcomemail());
        //return new welcomemail();
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'message' => 'Hello, how are you?'
        ];

        //$email = new welcomemail("Testing using Dynamic Messages from Email Controller");
        Mail::to('info@goldengalorecompetitions.co.uk')->send(new welcomemail($data));
        //return new welcomemail($email);
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

        $Message = $request->Message;

        $email = new welcomemail($Message);
        Mail::to('xavier.khonje@gmail.com')->send(new welcomemail($email));
        return new welcomemail();

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
