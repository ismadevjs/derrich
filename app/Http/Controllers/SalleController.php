<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index()
    {
        $salles = Salle::all();
        return view('salles.index', compact('salles'));
    }

    public function create()
    {
        return view('salles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'adresse' => 'required|string',
        ]);

        Salle::create($request->all());
        return redirect()->route('salles.index')->with('success', 'Venue created successfully.');
    }

    public function edit(Salle $salle)
    {
        return view('salles.edit', compact('salle'));
    }

    public function update(Request $request, Salle $salle)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'adresse' => 'required|string',
        ]);

        $salle->update($request->all());
        return redirect()->route('salles.index')->with('success', 'Venue updated successfully.');
    }

    public function destroy(Salle $salle)
    {
        $salle->delete();
        return redirect()->route('salles.index')->with('success', 'Venue deleted successfully.');
    }
}
