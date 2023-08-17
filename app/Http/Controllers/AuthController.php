<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\HttpResponses;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{

    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login(LoginUserRequest $request)
    {

        $request->validated($request->all());
        $credentials = $request->only('email', 'password','rememberme');
    
        // Get the user by email
        $user = User::where('email', $credentials['email'])->first();
        
       // if (!$user || !Hash::check(Hash::make($credentials['password']), $user->password)) {
        if (!$user) {
            // Invalid credentials
            return $this->error('','Credentials Do not Match', 401);
        }
        else
        {
            $user = User::where('email', $request->email)->first();

            $this->success([
                'user' => $user,
                'token' => $user->createToken('API Token of' . $user->name)->plainTextToken
            ]);
    
            $user->remember_token = $user->createToken('API Token of' . $user->name)->plainTextToken;
            return new UserResource($user);
        }


       /* $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {

            $user = User::where('email', $request->email)->first();

            $this->success([
                'user' => $user,
                'token' => $user->createToken('API Token of' . $user->name)->plainTextToken
            ]);
    
            $user->remember_token = $user->createToken('API Token of' . $user->name)->plainTextToken;
            return new UserResource($user);

        } else {
            // Authentication failed
            return $this->error('','Credentials Do not Match', 401);
        }    */    
    }
    
    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());
        $user = User::create([
            'name' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Saving the Saved - to a User Profile
        /*$profile = new userprofile;
        $profile->user_id = $user->id;
        $profile->title = $user->email;
        $profile->contactmobilenumber = $user->mobilenumber;

        $profile = (new UserprofileController)->create($profile);*/

        $saveduser = User::where('email', $user->email)->first();

        return [
                'user' => $user,
                'acl' => $saveduser->acl,
                'token' => $user->createToken('API token name of ' . $user->name)->plainTextToken
        ];
    }    

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->success([
            'message'=> 'You have been successfully Logged out'
        ]);

        return $request->name;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
