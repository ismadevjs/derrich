<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AthleteController extends Controller
{
    public function index()
    {
        $athletes = Athlete::with('club')->get();
        return view('athletes.index', compact('athletes'));
    }

    public function create()
    {
        $clubs = Club::all();
        return view('athletes.create', compact('clubs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'date_naissance' => 'required|date',
            'pays' => 'required|string|max:100',
            'wilaya' => 'required|string|max:100',
            'club_id' => 'required|exists:clubs,id',
            'poids' => 'required|string|max:50',
            'categorie' => 'required|string|max:50',
            'groupage' => 'required|string|max:10',
            'medical_status' => 'required|string|max:50',
            'photo' => 'nullable|image|max:2048',
            'rapport_medical_pdf' => 'nullable|file|mimes:pdf|max:5120',
            'cardiovasculaire' => 'nullable|string|max:100',
        ]);

        $data = $request->all();
        $data['age'] = now()->diffInYears($request->date_naissance);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        if ($request->hasFile('rapport_medical_pdf')) {
            $data['rapport_medical_pdf'] = $request->file('rapport_medical_pdf')->store('medical_reports', 'public');
        }

        Athlete::create($data);
        return redirect()->route('athletes.index')->with('success', 'Athlete created successfully.');
    }

    public function edit(Athlete $athlete)
    {
        $clubs = Club::all();
        return view('athletes.edit', compact('athlete', 'clubs'));
    }

    public function update(Request $request, Athlete $athlete)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'date_naissance' => 'required|date',
            'pays' => 'required|string|max:100',
            'wilaya' => 'required|string|max:100',
            'club_id' => 'required|exists:clubs,id',
            'poids' => 'required|string|max:50',
            'categorie' => 'required|string|max:50',
            'groupage' => 'required|string|max:10',
            'medical_status' => 'required|string|max:50',
            'photo' => 'nullable|image|max:2048',
            'rapport_medical_pdf' => 'nullable|file|mimes:pdf|max:5120',
            'cardiovasculaire' => 'nullable|string|max:100',
        ]);

        $data = $request->all();
        $data['age'] = now()->diffInYears($request->date_naissance);

        if ($request->hasFile('photo')) {
            if ($athlete->photo) {
                Storage::disk('public')->delete($athlete->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        if ($request->hasFile('rapport_medical_pdf')) {
            if ($athlete->rapport_medical_pdf) {
                Storage::disk('public')->delete($athlete->rapport_medical_pdf);
            }
            $data['rapport_medical_pdf'] = $request->file('rapport_medical_pdf')->store('medical_reports', 'public');
        }

        $athlete->update($data);
        return redirect()->route('athletes.index')->with('success', 'Athlete updated successfully.');
    }

    public function destroy(Athlete $athlete)
    {
        if ($athlete->photo) {
            Storage::disk('public')->delete($athlete->photo);
        }
        if ($athlete->rapport_medical_pdf) {
            Storage::disk('public')->delete($athlete->rapport_medical_pdf);
        }
        $athlete->delete();
        return redirect()->route('athletes.index')->with('success', 'Athlete deleted successfully.');
    }
}
