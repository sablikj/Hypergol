<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Launch;

class LaunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allLaunches = Launch::all();
        return view('launches.index', ['allLaunches' => $allLaunches])->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('launches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // server side validation
        $validatedData = $request->validate([
            'mission_name' => 'required|max:255',
            'nation' => 'required|max:255',
            'launch_provider' => 'required|max:255',
            'rocket' => 'required|max:255',
            'payload' => 'required|max:255',
            'payload_mass' => 'required|integer',
            'location' => 'required|max:255',
            'launch_date' => 'required|date',
        ]);

        $newLaunch = new Launch();
        $newLaunch->mission_name = $request->mission_name;
        $newLaunch->nation = $request->nation;
        $newLaunch->launch_provider = $request->launch_provider;
        $newLaunch->rocket = $request->rocket;
        $newLaunch->payload = $request->payload;
        $newLaunch->payload_mass = $request->payload_mass;
        $newLaunch->location = $request->location;
        $newLaunch->launch_date = $request->launch_date;
        $newLaunch->save();

        // redirect
        return redirect()->route('dashboard')->with('success', 'Launch created successfully.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Launch $launch)
    {
        return view('launches.show', compact('launch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Launch $launch)
    {
        return view('launches.edit', compact('launch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Launch $launch)
    {
        // server side validation
        $validatedData = $request->validate([
            'mission_name' => 'required|max:255',
            'nation' => 'required|max:255',
            'launch_provider' => 'required|max:255',
            'rocket' => 'required|max:255',
            'payload' => 'required|max:255',
            'payload_mass' => 'required|integer',
            'location' => 'required|max:255',
            'launch_date' => 'required|date',
        ]);

        $launch->update($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Launch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Launch $launch)
    {
        $launch->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Launch deleted successfully');
    }
}
