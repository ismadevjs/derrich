<?php

namespace App\Http\Controllers;

use App\Models\Combat;
use App\Models\Competition;
use App\Models\Athlete;
use Illuminate\Http\Request;

class CombatController extends Controller
{
    public function index()
    {
        $combats = Combat::with(['competition', 'athlete1', 'athlete2', 'vainqueur'])->get();
        return view('combats.index', compact('combats'));
    }

    public function create()
    {
        $competitions = Competition::all();
        $athletes = Athlete::all();
        return view('combats.create', compact('competitions', 'athletes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'athlete1_id' => 'required|exists:athletes,id',
            'athlete2_id' => 'required|exists:athletes,id|different:athlete1_id',
            'heure' => 'required',
            'type_combat' => 'required|string|max:50',
        ]);

        Combat::create($request->all());
        return redirect()->route('combats.index')->with('success', 'Fight created successfully.');
    }

    public function edit(Combat $combat)
    {
        $competitions = Competition::all();
        $athletes = Athlete::all();
        return view('combats.edit', compact('combat', 'competitions', 'athletes'));
    }

    public function update(Request $request, Combat $combat)
    {
        $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'athlete1_id' => 'required|exists:athletes,id',
            'athlete2_id' => 'required|exists:athletes,id|different:athlete1_id',
            'vainqueur_id' => 'nullable|exists:athletes,id',
            'heure' => 'required',
            'resultat' => 'nullable|string|max:255',
            'performance' => 'nullable|string',
            'type_combat' => 'required|string|max:50',
        ]);

        $combat->update($request->all());
        return redirect()->route('combats.index')->with('success', 'Fight updated successfully.');
    }

    public function destroy(Combat $combat)
    {
        $combat->delete();
        return redirect()->route('combats.index')->with('success', 'Fight deleted successfully.');
    }
}
