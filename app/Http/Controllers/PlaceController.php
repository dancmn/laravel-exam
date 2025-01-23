<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::latest()->paginate(5);
        return view('places.index', ['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'repair'=>'boolean',
            'work'=>'boolean',
        ]);
        $place = new Place;
        $place->name = $request->name;
        $place->description = $request->description;
        $place->repair = $request->repair;
        $place->work = $request->work;
        $place->save();
        return redirect('/place');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        return view('places.show', ['place'=>$place]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        return view('places.update', ['place'=>$place]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'repair'=>'boolean',
            'work'=>'boolean',
        ]);
        $place->name = $request->name;
        $place->description = $request->description;
        $place->repair = $request->repair;
        $place->work = $request->work;
        if($place->save()) return redirect('/place')->with('status', 'Update success');
        else return redirect()->route('places.index')->with('status', 'Update don`t success');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        if ($place->delete()) return redirect('/place')->with('status','Delete success');
        else return redirect()->route('places.show', ['place'=>$place->id])->with('status','Delete don`t success');
    }
}
