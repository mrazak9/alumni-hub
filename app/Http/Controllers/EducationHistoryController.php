<?php

namespace App\Http\Controllers;

use App\Models\EducationHistory;
use Illuminate\Http\Request;

class EducationHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educationHistories = EducationHistory::all();
        return view('pages.education_histories.index', compact('educationHistories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.education_histories.create');
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
            'institution_name' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'start_year' => 'required|integer',
            'end_year' => 'nullable|integer',
            'gpa' => 'nullable|numeric',
        ]);

        EducationHistory::create($data);
        return redirect()->route('education_histories.index')->with('success', 'Education history created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EducationHistory $educationHistory)
    {
        return view('pages.education_histories.show', compact('educationHistory'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationHistory $educationHistory)
    {
        return view('pages.education_histories.edit', compact('educationHistory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationHistory $educationHistory)
    {
        $data = $request->validate([
            'institution_name' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'start_year' => 'required|integer',
            'end_year' => 'nullable|integer',
            'gpa' => 'nullable|numeric',
        ]);

        $educationHistory->update($data);
        return redirect()->route('education_histories.index')->with('success', 'Education history updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationHistory $educationHistory)
    {
        $educationHistory->delete();
        return redirect()->route('education_histories.index')->with('success', 'Education history deleted successfully.');
    }
}
