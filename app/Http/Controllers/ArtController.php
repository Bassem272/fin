<?php

namespace App\Http\Controllers;

use App\Models\art;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arts = art::all($columns = ['*']);
        return response()->json($arts, 201, ['Content-Type' => 'application/json;charset=UTF-8',], JSON_PRETTY_PRINT);



    }

    // find one item
    public function showOne($id){
        $art = art::find($id);

        return response($art, 200, ['Content-Type => application/json;charset=UTF-8',], JSON_PRETTY_PRINT);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            
        ]);
        $art = art::create($data);
        return response()->json($art, 201, ['Content-Type' => 'application/json;charset=UTF-8',], JSON_PRETTY_PRINT);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(art $art)
    {
        // DISplay the specific resource
        return response()->json($art, 200, ['Content-Type' => 'application/json;charset=UTF-8',], JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(art $art)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, art $art)
    {
        // update the specified resource in storage.
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
        ]);
        $art->update($data);
        return response()->json($art, 200, ['Content-Type' => 'application/json;charset=UTF-8',], JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(art $art)
    {
        // delete specified art
        $art->delete();
        return response()->json(['message' => 'item deleted success'], 204, ['Content-Type' => 'application/json;charset=UTF-8',], JSON_PRETTY_PRINT);
    }
}
