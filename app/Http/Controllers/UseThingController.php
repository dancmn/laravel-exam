<?php

namespace App\Http\Controllers;

use App\Models\UseThing;
use Illuminate\Http\Request;

class UseThingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
        $request->validate([
            'thing_id' => 'required',
            'user_id'=>'required',
            'place_id'=>'required',
            'amount'=>'required',
        ]);

        $useThing = UseThing::where('thing_id', $request->thing_id)->first();

        if ($useThing) {
            $useThing->update([
                'user_id' => $request->user_id,
                'place_id' => $request->place_id,
                'amount' => $request->amount,
            ]);
        } else {
            UseThing::create([
                'thing_id' => $request->thing_id,
                'user_id' => $request->user_id,
                'place_id' => $request->place_id,
                'amount' => $request->amount,
            ]);
        }

        return redirect('/thing');
    }

    /**
     * Display the specified resource.
     */
    public function show(UseThing $useThing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UseThing $useThing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UseThing $useThing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UseThing $useThing)
    {
        //
    }
}
