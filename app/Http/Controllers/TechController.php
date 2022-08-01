<?php

namespace App\Http\Controllers;

use App\Models\Tech;
use App\Http\Requests\StoreTechRequest;
use App\Http\Requests\UpdateTechRequest;
use App\Http\Resources\TechResource;

class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TechResource::collection(Tech::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechRequest $request)
    {
        $image = cloudinary()->upload($request->file('image')->getRealPath(),['folder' => 'tech'])->getSecurePath();
        Tech::create([
            'name' => $request->name,
            'image' => $image
        ]);
        return response()->json([
            "status" => 200,
            "message" => "New tech was added successfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function show(Tech $tech)
    {
        return new TechResource($tech);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function edit(Tech $tech)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechRequest  $request
     * @param  \App\Models\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechRequest $request, Tech $tech)
    {
        $tech->update([
            'name' => $request->name,
            'image' => $request->image
        ]);

        return new TechResource($tech);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tech $tech)
    {
        $tech->delete();
        return response()->json([
            "status" => 200,
            "message" => "Tech Deleted Successfully"
        ]);
    }
}
