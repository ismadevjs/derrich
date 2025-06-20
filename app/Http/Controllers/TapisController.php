<?php

namespace App\Http\Controllers;

use App\Models\Tapis;
use App\Models\Salle;
use Illuminate\Http\Request;

class TapisController extends Controller
{
    public function index()
    {
        $tapis = Tapis::with('salle')->get();
        return view('tapis.index', compact('tapis'));
    }

    public function create()
    {
        $salles = Salle::all();
        return view('tapis.create', compact('salles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'salle_id' => 'required|exists:salles,id',
            'nom' => 'required|string|max:50',
        ]);

        Tapis::create($request->all());
        return redirect()->route('tapis.index')->with('success', 'Mat created successfully.');
    }

    public function edit(Tapis $tapis)
    {
        $salles = Salle::all();
        return view('tapis.edit', compact('tapis', 'salles'));
    }

    public function update(Request $request, Tapis $tapis)
    {
        $request->validate([
            'salle_id' => 'required|exists:salles,id',
            'nom' => 'required|string|max:50',
        ]);

        $tapis->update($request->all());
        return redirect()->route('tapis.index')->with('success', 'Mat updated successfully.');
    }

    public function destroy(Tapis $tapis)
    {
        $tapis->delete();
        return redirect()->route('tapis.index')->with('success', 'Mat deleted successfully.');
    }
}
