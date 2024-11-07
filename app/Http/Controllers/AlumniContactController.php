<?php

namespace App\Http\Controllers;

use App\Models\AlumniContact;
use Illuminate\Http\Request;

class AlumniContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = AlumniContact::all();
        return view('pages.alumni_contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.alumni_contacts.create');
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
            'contact_type' => 'required|string',
            'contact_value' => 'required|string',
        ]);

        AlumniContact::create($data);
        return redirect()->route('alumni_contacts.index')->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniContact $alumniContact)
    {
        return view('pages.alumni_contacts.show', compact('alumniContact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AlumniContact $alumniContact)
    {
        return view('pages.alumni_contacts.edit', compact('alumniContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlumniContact $alumniContact)
    {
        $data = $request->validate([
            'contact_type' => 'required|string',
            'contact_value' => 'required|string',
        ]);

        $alumniContact->update($data);
        return redirect()->route('alumni_contacts.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumniContact $alumniContact)
    {
        $alumniContact->delete();
        return redirect()->route('alumni_contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
