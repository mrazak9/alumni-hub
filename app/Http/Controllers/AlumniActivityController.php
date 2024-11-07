<?php

namespace App\Http\Controllers;

use App\Models\AlumniActivity;
use Illuminate\Http\Request;

class AlumniActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = AlumniActivity::all();
        return view('pages.alumni_activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.alumni_activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'alumni_id' => 'required|exists:alumni,id',
            'activity_type' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        AlumniActivity::create($data);
        return redirect()->route('alumni_activities.index')->with('success', 'Activity created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniActivity $alumniActivity)
    {
        return view('pages.alumni_activities.show', compact('alumniActivity'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AlumniActivity $alumniActivity)
    {
        return view('pages.alumni_activities.edit', compact('alumniActivity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlumniActivity $alumniActivity)
    {
        $data = $request->validate([
            'activity_type' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $alumniActivity->update($data);
        return redirect()->route('alumni_activities.index')->with('success', 'Activity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumniActivity $alumniActivity)
    {
        $alumniActivity->delete();
        return redirect()->route('alumni_activities.index')->with('success', 'Activity deleted successfully.');
    }
}
