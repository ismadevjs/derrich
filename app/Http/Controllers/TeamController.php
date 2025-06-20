<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Club;
use App\Models\Coach;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::with(['club', 'coach'])->get();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        $clubs = Club::all();
        $coachs = Coach::all();
        return view('teams.create', compact('clubs', 'coachs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'club_id' => 'required|exists:clubs,id',
            'coach_id' => 'required|exists:coachs,id',
        ]);

        Team::create($request->all());
        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }

    public function edit(Team $team)
    {
        $clubs = Club::all();
        $coachs = Coach::all();
        return view('teams.edit', compact('team', 'clubs', 'coachs'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'club_id' => 'required|exists:clubs,id',
            'coach_id' => 'required|exists:coachs,id',
        ]);

        $team->update($request->all());
        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
    }
}
