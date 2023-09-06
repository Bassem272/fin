<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =User::all();
        return response()->json(['message'=>'all users are here','users'=>$users],
        201, ['Content-Type' => 'application/json;charset=UTF-8',], );

    }

    // find one item
    // public function showOne($id){
    //     $user = user::find($id);

    //     return response($user, 200, ['Content-Type => application/json;charset=UTF-8',], );
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
    }
    // public function getCsrfToken()
    // {
    //     $token = csrf_token(); // Generate the CSRF token
    //     Log::info('CSRF token: ' . $token);

    //     return response()->json(['csrf_token' => $token],201);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
'password'=>'integer|required|min:6|max:12',
'role'=>'required|string|in:admin,customer'

        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
        return response()->json(['message'=>'user created successfully','user'=>$user],201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        // DISplay the specific resource
        return response()->json($user, 200, ['Content-Type' => 'application/json;charset=UTF-8',], );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        // update the specified resource in storage.
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
'password'=>'integer|required|min:6|max:12',
        ]);
        $user->update($data);
        return response()->json(['message'=>'user updated success','users'=>$user], 200, ['Content-Type' => 'application/json;charset=UTF-8',], );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        // delete specified user
        $user->delete();
        return response()->json(['message' => 'item deleted success'], 204, ['Content-Type' => 'application/json;charset=UTF-8',], );
    }

    // we will upgrade the customer to admin
    public function upgrade(user $user){
        $user->update(['role'=>'admin']);
        return response()->json(['message'=>'user upgraded success','users'=>  $user], 200, ['Content-Type' => 'application/json;charset=UTF-8',], );
    }
}

