<?php

namespace App\Http\Controllers;

use App\Models\Spectateur;
use Illuminate\Http\Request;

class SpectateurController extends Controller
{
    public function index()
    {
        $spectateurs = Spectateur::all();
        return view('spectateurs.index', compact('spectateurs'));
    }

    public function create()
    {
        return view('spectateurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:spectateurs,email',
            'acces_live' => 'boolean',
        ]);

        Spectateur::create($request->all());
        return redirect()->route('spectateurs.index')->with('success', 'Spectator created successfully.');
    }

    public function edit(Spectateur $spectateur)
    {
        return view('spectateurs.edit', compact('spectateur'));
    }

    public function update(Request $request, Spectateur $spectateur)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:spectateurs,email,' . $spectateur->id,
            'acces_live' => 'boolean',
        ]);

        $spectateur->update($request->all());
        return redirect()->route('spectateurs.index')->with('success', 'Spectator updated successfully.');
    }

    public function destroy(Spectateur $spectateur)
    {
        $spectateur->delete();
        return redirect()->route('spectateurs.index')->with('success', 'Spectator deleted successfully.');
    }
}
