<?php

namespace App\Http\Controllers;

use http\Message\Body;
use Illuminate\Http\Request;
use App\Models\business;
use Illuminate\Support\Facades\Http;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = business::paginate(20);
        return view('resturants')->with('business', $business);
    }

    public function testapi()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/todos/1');
        return response()->json($response->json(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        business::create([
            'businessname'=>'Diamond',
            'businesstype'=>'Food Business',
            'businesslocation'=>'Blantyre',
            'businessPhysicalAddress'=>'Machinjiri Area 3'
        ]);
    }

    public function CalculatePrice()
    {
        return 200;
    }

    public function massassignvalues()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$businessname = $request->get('businessname');
        $businesstype = $request->get('businesstype');
        $businesslocation = $request->get('businesslocation');
        $businessPhysicalAddress = $request->get('businessphysicallocation');


        business::create([
            'businessname'=>$businessname,
            'businesstype'=>$businesstype,
            'businesslocation'=>$businesslocation,
            'businessPhysicalAddress'=>$businessPhysicalAddress
        ]);*/

        $business = business::all();
        //$business = business::paginate(20);
        return view('resturants')->with('business', $business);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json("Welcome");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('foodstorefrontend');
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
        return view('foodstorefrontend');
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
