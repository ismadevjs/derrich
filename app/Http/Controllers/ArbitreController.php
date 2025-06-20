<?php

namespace App\Http\Controllers;

use App\Models\Arbitre;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArbitreController extends Controller
{
    public function index()
    {
        $arbitres = Arbitre::with('club')->get();
        return view('arbitres.index', compact('arbitres'));
    }

    public function create()
    {
        $clubs = Club::all();
        return view('arbitres.create', compact('clubs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'pays' => 'required|string|max:100',
            'wilaya' => 'required|string|max:100',
            'club_id' => 'required|exists:clubs,id',
            'groupage' => 'required|string|max:10',
            'niveau' => 'required|string|max:50',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Arbitre::create($data);
        return redirect()->route('arbitres.index')->with('success', 'Referee created successfully.');
    }

    public function edit(Arbitre $arbitre)
    {
        $clubs = Club::all();
        return view('arbitres.edit', compact('arbitre', 'clubs'));
    }

    public function update(Request $request, Arbitre $arbitre)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'pays' => 'required|string|max:100',
            'wilaya' => 'required|string|max:100',
            'club_id' => 'required|exists:clubs,id',
            'groupage' => 'required|string|max:10',
            'niveau' => 'required|string|max:50',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('photo')) {
            if ($arbitre->photo) {
                Storage::disk('public')->delete($arbitre->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $arbitre->update($data);
        return redirect()->route('arbitres.index')->with('success', 'Referee updated successfully.');
    }

    public function destroy(Arbitre $arbitre)
    {
        if ($arbitre->photo) {
            Storage::disk('public')->delete($arbitre->photo);
        }
        $arbitre->delete();
        return redirect()->route('arbitres.index')->with('success', 'Referee deleted successfully.');
    }
}
