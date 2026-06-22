<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advice;

class Controller_advice extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advices = Advice::all();
        return response()->json($advices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $advice = new Advice();
        $advice->name = $request->name;
        $advice->title = $request->title;
        $advice->phone = $request->phone;
        $advice->email = $request->email;
        $advice->description = $request->description;
        $advice->save();
        return response()->json($advice, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $advice = Advice::find($id);
        return response()->json($advice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $advice = Advice::find($id);
        $advice->title = $request->title;
        $advice->content = $request->content;
        $advice->save();
        return response()->json($advice);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advice = Advice::find($id);
        $advice->delete();
        return response()->json(null, 204);
    }
}
