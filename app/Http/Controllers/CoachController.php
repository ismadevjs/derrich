<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Club;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        $coachs = Coach::with('club')->get();
        return view('coachs.index', compact('coachs'));
    }

    public function create()
    {
        $clubs = Club::all();
        return view('coachs.create', compact('clubs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'pays' => 'required|string|max:100',
            'wilaya' => 'required|string|max:100',
            'club_id' => 'required|exists:clubs,id',
        ]);

        Coach::create($request->all());
        return redirect()->route('coachs.index')->with('success', 'Coach created successfully.');
    }

    public function edit(Coach $coach)
    {
        $clubs = Club::all();
        return view('coachs.edit', compact('coach', 'clubs'));
    }

    public function update(Request $request, Coach $coach)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'pays' => 'required|string|max:100',
            'wilaya' => 'required|string|max:100',
            'club_id' => 'required|exists:clubs,id',
        ]);

        $coach->update($request->all());
        return redirect()->route('coachs.index')->with('success', 'Coach updated successfully.');
    }

    public function destroy(Coach $coach)
    {
        $coach->delete();
        return redirect()->route('coachs.index')->with('success', 'Coach deleted successfully.');
    }
}
