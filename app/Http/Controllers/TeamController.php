<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        // Get all team members
        $team = Team::all();
        return  view('team.index', compact('team'));
    }
   
    
    public function create()
    {
        return view('team.create');
    }
    public function edit(string $id)
    {
        $team = Team::findOrFail($id);
        return view('team.edit', compact('team'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $teamData = $request->only(['name', 'designation', 'twitter', 'linkedin', 'facebook']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $teamData['image'] = $imagePath;
        }

        $team = Team::create($teamData);

        return redirect()->route('team.index')->with('success', 'Team member has been added successfully!');
    }

    // public function show($id)
    // {
    //     $team = Team::findOrFail($id);
    //     return response()->json($team);
    // }

    // public function edit($id)
    // {
    //     $team = Team::findOrFail($id);
    //     return response()->json($team);
    // }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $teamData = $request->only(['name', 'designation', 'twitter', 'linkedin', 'facebook']);

        if ($request->hasFile('image')) {
            // Optionally delete the old image if needed
            // Storage::delete($team->image);
            $imagePath = $request->file('image')->store('images', 'public');
            $teamData['image'] = $imagePath;
        }

        $team->update($teamData);

        return redirect()->route('team.index')->with('success', 'Team member Updated successfully!');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        // Optionally delete the image from storage if needed
        Storage::delete($team->image);

        $team->delete();

        return redirect()->route('team.index')->with('success', 'Team member deleted successfully!');
        // return response()->json(['message' => 'Team member deleted successfully!']);
    }
}
