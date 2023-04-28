<?php

namespace App\Http\Controllers;

use http\Message\Body;
use Illuminate\Http\Request;
use App\Models\business;
use Illuminate\Support\Facades\Http;
use App\Models\Menu;
use App\Http\Resources\ResturantResource;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (strpos($request->path(), 'api/') === 0) {
            return ResturantResource::collection(
                business::all());
        }
        else
        {              
            $xool = school::paginate(10);
            return view('admin.school', compact('xool'));
        }         
    } 

    public function searchfoodstoreapi(Request $request)
    {
        $business = new business();
        //$business->name = $request->get('name');
        //$business->description = $request->get('description');

        $business->category = $request->get('category');
        //$business->contactperson = $request->get('contactperson');        
        //$business->email = $request->get('email');
        //$business->cellnumber = $request->get('cellnumber');          

        $response = business::where('category', $business->category)->get();
        return response()->json($response, 200);        
    }

    public function searchfoodstoremainapi(Request $request)
    {
        $business = new business();
        //$business->name = $request->get('name');
        //$business->description = $request->get('description');

        //$business->category = $request->get('category');
        //$business->contactperson = $request->get('contactperson');        
        //$business->email = $request->get('email');
        //$business->cellnumber = $request->get('cellnumber');          

        $response = business::all();
        return response()->json($response, 200);        
    }    

    public function searchfoodstorepaginateapi(Request $request)
    {
        $business = new business();
        //$business->name = $request->get('name');
        //$business->description = $request->get('description');

        //$business->category = $request->get('category');
        //$business->contactperson = $request->get('contactperson');        
        //$business->email = $request->get('email');
        //$business->cellnumber = $request->get('cellnumber');          

        $response = business::paginate(4);
        return response()->json($response, 200);        
    }      

    public function searchfoodstoremenuapi(Request $request)
    {
        $business = new business();
        //$business->name = $request->get('name');
        //$business->description = $request->get('description');

        //$business->category = $request->get('category');
        //$business->contactperson = $request->get('contactperson');        
        //$business->email = $request->get('email');
        //$business->cellnumber = $request->get('cellnumber');          

        $response = Menu::all();
        return response()->json($response, 200);        
    }

    public function searchfoodstoremenupaginateapi(Request $request)
    {
        $business = new business();
        //$business->name = $request->get('name');
        //$business->description = $request->get('description');

        //$business->category = $request->get('category');
        //$business->contactperson = $request->get('contactperson');        
        //$business->email = $request->get('email');
        //$business->cellnumber = $request->get('cellnumber');          

        $response = Menu::all();
        return response()->json($response, 200);        
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
