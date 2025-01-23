<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use App\Models\UseThing;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $things = Thing::latest()->paginate(5);
        return view('things.index', ['things' => $things]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('things.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Gate::authorize('create', [self::class]);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'wrnt'=>'date',
        ]);
        $thing = new Thing;
        $thing->name = $request->name;
        $thing->description = $request->description;
        $thing->wrnt = $request->wrnt;
        $thing->master_id = Auth::id();
        $thing->save();
        return redirect('/thing');
    }

    /**
     * Display the specified resource.
     */
    public function show(Thing $thing)
    {
        $master = User::findOrFail($thing->master_id);
        $users = User::all();
        $places = Place::all();
        $usethings = UseThing::all();
        return view('things.show', ['thing'=>$thing, 'master'=>$master, 'users'=>$users, 'places'=>$places, 'usethings'=>$usethings]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thing $thing)
    {
        $this->authorize('update', $thing);
        return view('things.update', ['thing'=>$thing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thing $thing, User $user)
    {
        $this->authorize('update', $thing);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'wrnt'=>'date',
        ]);
        $thing->name = $request->name;
        $thing->description = $request->description;
        $thing->wrnt = $request->wrnt;
        $thing->master_id = Auth::id();
        if($thing->save()) return redirect('/thing')->with('status', 'Update success');
        else return redirect()->route('things.index')->with('status', 'Update don`t success');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thing $thing)
    {
        $this->authorize('delete', $thing);
        if ($thing->delete()) return redirect('/thing')->with('status','Delete success');
        else return redirect()->route('things.show', ['thing'=>$thing->id])->with('status','Delete don`t success');
    }
}
