<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\Competition;
use App\Models\Athlete;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index()
    {
        $rankings = Ranking::with(['competition', 'athlete'])->get();
        return view('rankings.index', compact('rankings'));
    }

    public function create()
    {
        $competitions = Competition::all();
        $athletes = Athlete::all();
        return view('rankings.create', compact('competitions', 'athletes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'athlete_id' => 'required|exists:athletes,id',
            'poids' => 'required|string|max:50',
            'rang' => 'required|integer|min:1',
        ]);

        Ranking::create($request->all());
        return redirect()->route('rankings.index')->with('success', 'Ranking created successfully.');
    }

    public function edit(Ranking $ranking)
    {
        $competitions = Competition::all();
        $athletes = Athlete::all();
        return view('rankings.edit', compact('ranking', 'competitions', 'athletes'));
    }

    public function update(Request $request, Ranking $ranking)
    {
        $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'athlete_id' => 'required|exists:athletes,id',
            'poids' => 'required|string|max:50',
            'rang' => 'required|integer|min:1',
        ]);

        $ranking->update($request->all());
        return redirect()->route('rankings.index')->with('success', 'Ranking updated successfully.');
    }

    public function destroy(Ranking $ranking)
    {
        $ranking->delete();
        return redirect()->route('rankings.index')->with('success', 'Ranking deleted successfully.');
    }
}
