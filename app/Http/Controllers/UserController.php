<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = user::all($columns = ['*']);
        return response()->json(['message'=>'nottnt'], 201, ['Content-Type' => 'application/json;charset=UTF-8',], JSON_PRETTY_PRINT);



    }

    // find one item
    public function showOne($id){
        $user = user::find($id);

        return response($user, 200, ['Content-Type => application/json;charset=UTF-8',], JSON_PRETTY_PRINT);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
    }
    public function getCsrfToken()
    {
        $token = csrf_token(); // Generate the CSRF token
        Log::info('CSRF token: ' . $token);

        return response()->json(['csrf_token' => $token],201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
'password'=>'integer|required|min:6|max:12',

        ]);
        $user = User::create($data);
        return response()->json(201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        // DISplay the specific resource
        return response()->json($user, 200, ['Content-Type' => 'application/json;charset=UTF-8',], JSON_PRETTY_PRINT);
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
        return response()->json($user, 200, ['Content-Type' => 'application/json;charset=UTF-8',], JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        // delete specified user
        $user->delete();
        return response()->json(['message' => 'item deleted success'], 204, ['Content-Type' => 'application/json;charset=UTF-8',], JSON_PRETTY_PRINT);
    }
}

