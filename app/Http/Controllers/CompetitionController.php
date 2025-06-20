<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Salle;
use App\Models\Tapis;
use App\Models\Arbitre;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = Competition::with(['salle', 'tapis', 'arbitre'])->get();
        return view('competitions.index', compact('competitions'));
    }

    public function create()
    {
        $salles = Salle::all();
        $tapis = Tapis::all();
        $arbitres = Arbitre::all();
        return view('competitions.create', compact('salles', 'tapis', 'arbitres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'date' => 'required|date',
            'salle_id' => 'required|exists:salles,id',
            'tapis_id' => 'required|exists:tapis,id',
            'arbitre_id' => 'required|exists:arbitres,id',
        ]);

        Competition::create($request->all());
        return redirect()->route('competitions.index')->with('success', 'Competition created successfully.');
    }

    public function edit(Competition $competition)
    {
        $salles = Salle::all();
        $tapis = Tapis::all();
        $arbitres = Arbitre::all();
        return view('competitions.edit', compact('competition', 'salles', 'tapis', 'arbitres'));
    }

    public function update(Request $request, Competition $competition)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'date' => 'required|date',
            'salle_id' => 'required|exists:salles,id',
            'tapis_id' => 'required|exists:tapis,id',
            'arbitre_id' => 'required|exists:arbitres,id',
        ]);

        $competition->update($request->all());
        return redirect()->route('competitions.index')->with('success', 'Competition updated successfully.');
    }

    public function destroy(Competition $competition)
    {
        $competition->delete();
        return redirect()->route('competitions.index')->with('success', 'Competition deleted successfully.');
    }
}
