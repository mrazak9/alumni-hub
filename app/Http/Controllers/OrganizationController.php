<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('pages.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('pages.organizations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'alumni_id' => 'required|exists:alumni,id',
            'name' => 'required|string',
            'position' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        Organization::create($data);
        return redirect()->route('organizations.index')->with('success', 'Organization created successfully.');
    }

    public function show(Organization $organization)
    {
        return view('pages.organizations.show', compact('organization'));
    }

    public function edit(Organization $organization)
    {
        return view('pages.organizations.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $organization->update($data);
        return redirect()->route('organizations.index')->with('success', 'Organization updated successfully.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('organizations.index')->with('success', 'Organization deleted successfully.');
    }
}
