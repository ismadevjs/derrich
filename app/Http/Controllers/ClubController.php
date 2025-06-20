<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::all();
        return view('clubs.index', compact('clubs'));
    }

    public function create()
    {
        return view('clubs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'wilaya' => 'required|string|max:100',
            'adresse' => 'required|string',
        ]);

        Club::create($request->all());
        return redirect()->route('clubs.index')->with('success', 'Club created successfully.');
    }

    public function edit(Club $club)
    {
        return view('clubs.edit', compact('club'));
    }

    public function update(Request $request, Club $club)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'wilaya' => 'required|string|max:100',
            'adresse' => 'required|string',
        ]);

        $club->update($request->all());
        return redirect()->route('clubs.index')->with('success', 'Club updated successfully.');
    }

    public function destroy(Club $club)
    {
        $club->delete();
        return redirect()->route('clubs.index')->with('success', 'Club deleted successfully.');
    }
}
