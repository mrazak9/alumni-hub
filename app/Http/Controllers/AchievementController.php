<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::all();
        return view('pages.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('pages.achievements.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'alumni_id' => 'required|exists:alumni,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Achievement::create($data);
        return redirect()->route('achievements.index')->with('success', 'Achievement created successfully.');
    }

    public function show(Achievement $achievement)
    {
        return view('pages.achievements.show', compact('achievement'));
    }

    public function edit(Achievement $achievement)
    {
        return view('pages.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $achievement->update($data);
        return redirect()->route('achievements.index')->with('success', 'Achievement updated successfully.');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return redirect()->route('achievements.index')->with('success', 'Achievement deleted successfully.');
    }
}
