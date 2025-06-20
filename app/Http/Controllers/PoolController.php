<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\Competition;
use App\Models\Athlete;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function index()
    {
        $pools = Pool::with('competition')->get();
        return view('pools.index', compact('pools'));
    }

    public function create()
    {
        $competitions = Competition::all();
        return view('pools.create', compact('competitions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'nom' => 'required|string|max:50',
        ]);

        Pool::create($request->all());
        return redirect()->route('pools.index')->with('success', 'Pool created successfully.');
    }

    public function edit(Pool $pool)
    {
        $competitions = Competition::all();
        return view('pools.edit', compact('pool', 'competitions'));
    }

    public function update(Request $request, Pool $pool)
    {
        $request->validate([
            'competition_id' => 'required|exists:competitions,id',
            'nom' => 'required|string|max:50',
        ]);

        $pool->update($request->all());
        return redirect()->route('pools.index')->with('success', 'Pool updated successfully.');
    }

    public function destroy(Pool $pool)
    {
        $pool->delete();
        return redirect()->route('pools.index')->with('success', 'Pool deleted successfully.');
    }

    public function assignAthletes(Pool $pool)
    {
        $athletes = Athlete::all();
        return view('pools.assign', compact('pool', 'athletes'));
    }

    public function storeAthletes(Request $request, Pool $pool)
    {
        $request->validate([
            'athlete_ids' => 'required|array',
            'athlete_ids.*' => 'exists:athletes,id',
        ]);

        $pool->athletes()->sync($request->athlete_ids);
        return redirect()->route('pools.index')->with('success', 'Athletes assigned to pool successfully.');
    }
}
