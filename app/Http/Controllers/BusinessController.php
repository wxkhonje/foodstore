<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\categorie;
use App\Models\location;
use App\Http\Controllers\CategorieController;
use App\Http\Requests\StoreBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;
use App\Http\Resources\BusinessResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::id();

        if (strpos($request->path(), 'api/') === 0) {            
            return BusinessResource::collection(
                Business::where('user_id', $userId)->get());
        }
        else
        {
            $business = Business::where('user_id', $userId)->paginate(5);
            $categories = categorie::all();

            $categoryoptions = [];
            foreach ($categories as $option) {
                $categoryoptions[$option->id] = $option->name;
            }

            return view('admin.business', compact('business', 'categoryoptions'));
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
     * @param  \App\Http\Requests\StoreBusinessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBusinessRequest $request)
    {
        $userId = Auth::id();
        $category = categorie::find($request->category);

        if (strpos($request->path(), 'api/') === 0) {
            //$request->validated($request->all());
            $newbusiness = Business::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'image_path'=>$request->image_path,
                'category'=>$category->name,
                'contactperson'=>$request->contactperson,  
                'email'=>$request->email,
                'cellnumber'=>$request->cellnumber,  
                'user_id'=>$userId,
                'category_id'=>$category->id
          ]);            

            return BusinessResource::collection(
                Business::all());
        }
        else
        {              
            $request->validated($request->all());
            $business = new Business();
        
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/images/';
                $filename = str_replace(' ', '', $file_extension);
                $request->file('image')->move($destination_path, $filename);
    
                $business->image_path = $filename;
                
                $newbusiness = Business::create([
                    'name'=>$request->name,
                    'description'=>$request->description,
                    'image_path'=>$business->image_path,
                    'category'=>$category->name,
                    'contactperson'=>$request->contactperson,  
                    'email'=>$request->email,
                    'cellnumber'=>$request->cellnumber,  
                    'user_id'=>$userId,
                    'category_id'=>$category->id
              ]);
        
                /*$location = new location();
        
                $location->district = $request->get('location');
                $location->PhysicalAddress = $request->get('PhysicalAddress');
                $location->longitude = $request->get('longitude');
                $location->latitude = $request->get('latitude');
                $location->region = 'Southern';
                $location->country = 'Malawi';
                $location->mainlanguage = 'Chichewa';
                $location->facebookhandle = $request->get('facebookhandle');
                $location->instagramhandle = $request->get('instagramhandle');
        
                $newbusiness->location()->save($location);*/
        
                $business = Business::where('user_id', $userId)->paginate(5);
                $categories = categorie::all();

                $categoryoptions = [];
                foreach ($categories as $option) {
                    $categoryoptions[$option->id] = $option->name;
                }
    
                return view('admin.business', compact('business', 'categoryoptions'));         
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business, Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {  
            return new BusinessResource($business);

            if($business->user_id == $userId)          
            {
                return new BusinessResource($business);
            }
        }
        else
        {
            $userId = Auth::id();

            if($business->user_id == $userId)          
            {
                return new BusinessResource($business);
                return view('admin.business')->with('business',$business);                
            }
            else
            {
                return view('admin.business')->with('business',$business);
            }

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBusinessRequest  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBusinessRequest $request, Business $business)
    {
        if (strpos($request->path(), 'api/') === 0) {
            $request->validated($request->all());

            $business->name = $request->name;
            $business->description = $request->description;
            $business->category = $request->category;
            $business->contactperson = $request->contactperson;
            $business->email = $request->email;
            $business->cellnumber = $request->cellnumber;

            //$business->save();

            return new BusinessResource($business);
        }
        else
        {              
            $business = Business::paginate(15);
            return view('admin.business')->with('business',$business);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        //
    } 

    public function UserBusinesses(Request $request, $userid)
    {
        if (strpos($request->path(), 'api/') === 0) {

            /*$businesses = DB::table('businesses')
            ->where('user_id', '=', $userid)
            ->get();*/

           // $businesses = business::where('user_id', '=', $userid)->get();

            $businesses = Business::all();
            return BusinessResource::collection($businesses);
        }
        else
        {
            $businesses = Business::where('user_id', '=', $userid)->get();
            return view('admin.userbusiness')->with('businesses',$businesses);
        }        
    }      
    
    public function GenericSearchBusinesses(StoreBusinessRequest $request)
    {
        $businesses = Business::all();
        return BusinessResource::collection($businesses); 
        
        if (strpos($request->path(), 'api/') === 0) {
            
            $categoryid = 0;
            if($request->BusinessCategory == "")
            {
                $categoryid = 1;
                $businesses = Business::where('category_id', '=', $categoryid)->get();
    
                return BusinessResource::collection($businesses);                
            }
            else
            {

                $categoryid = $request->BusinessCategory;
                $businesses = Business::where('category_id', '=', $categoryid)->get();
    
                return BusinessResource::collection($businesses);
            }
        }  
        else
        {

            $searchTerm = $request->search;
        
            $businesses = DB::table('businesses')
            ->where('name', 'like', '%'.$searchTerm.'%');
            //->orWhere('email', 'like', '%'.$searchTerm.'%')
            //->orWhereHas('posts', function ($query) use ($searchTerm) {
              //  $query->where('title', 'like', '%'.$searchTerm.'%');
            //})
            //->paginate(10);

            return view('admin.userbusiness')->with('businesses',$businesses);
        }

    }


    public function FulltextBusinessSearch(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {

            $searchTerm = $request->search;
            $businesses = Business::search($searchTerm);            

            return BusinessResource::collection($businesses);
        }
        else
        {
            $searchTerm = $request->search;
            $businesses = Business::search($searchTerm);
            return view('admin.userbusiness')->with('businesses',$businesses);
        } 
    }

    public function spike(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {
            
            $categoryid = $request->BusinessCategory;
            $Location = $request->location;
            $Foodtype = $request->foodtype;
            $MinimumPrice = $request->minimumPrice;
            $MaximumPrice = $request->maximumPrice;

            $businesses = Business::where('category_id', '=', $categoryid)->get();

            /*$Location = $request->location;
            $Foodtype = $request->Foodtype;
            $MinimumPrice = $request->MinimumPrice;
            $MaxmumPrice = $request->MaxmumPrice;
            $BusinessCategory = $request->BusinessCategory;

            $businesses = business::where('category_id', $BusinessCategory)
            ->get();*/
            return BusinessResource::collection($businesses);
        }        
    }

    public function Businessbycategory(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {


            /*$data = [
                'search' => $request->search,
                'location' => $request->location,
                'foodtype' => $request->Foodtype,
                'minimumPrice' => $request->MinimumPrice,
                'maximumprice' => $request->MaxmumPrice,
                'Businessbycategory' => $request->BusinessCategory
            ];

            return response()->json($data);*/

            
            $searchTerm = $request->search;
            $Location = $request->location;
            $Foodtype = $request->Foodtype;
            $MinimumPrice = $request->MinimumPrice;
            $MaxmumPrice = $request->MaxmumPrice;
            $BusinessCategory = $request->BusinessCategory;

            $businesses = Business::where('category_id', $BusinessCategory)
            ->get();         

            return BusinessResource::collection($businesses);
        }
        else
        {
            $searchTerm = $request->search;
            $businesses = Business::search($searchTerm);
            return view('admin.userbusiness')->with('businesses',$businesses);
        } 
    }
}
