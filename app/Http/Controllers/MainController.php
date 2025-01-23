<?php

namespace App\Http\Controllers;

use App\Models\UseThing;
use App\Models\Thing;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $things = Thing::with('master', 'useThings', 'places')->get();

        return view('main.hello', compact('things'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Thing $thing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UseThing $useThing, Place $place, Thing $thing, User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UseThing $useThing, Place $place, Thing $thing, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UseThing $useThing, Place $place, Thing $thing, User $user)
    {
        //
    }
}
