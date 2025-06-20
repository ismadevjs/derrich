@extends('layouts.app')

@section('content')
<h1>Edit Fight</h1>
<form action="{{ route('combats.update', $combat) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="competition_id" class="form-label">Competition</label>
        <select class="form-control @error('competition_id') is-invalid @form-control" id="competition_id" name="competition_id">
            <option value="">Select Competition</option>
            @foreach ($competitions as $competition)
            <option value="{{ $competition->id }}" {{ old('competition_id', $combat->competition_id) == $competition->id ? 'selected' : '' }}>{{ $competition->nom }}</option>
            @endforeach
        </select>
        @error('competition_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="athlete1_id" class="form-label">Athlete 1</label>
        <select class="form-control @error('athlete1_id') is-invalid @form-control" id="athlete1_id" name="athlete1_id">
            <option value="">Select Athlete</option>
            @foreach ($athletes as $athlete)
            <option value="{{ $athlete->id }}" {{ old('athlete1_id', $combat->athlete1_id) == $athlete->id ? 'selected' : '' }}>{{ $athlete->nom }} {{ $athlete->prenom }}</option>
            @endforeach
        </select>
        @error('athlete1_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="athlete2_id" class="form-label">Athlete 2</label>
        <select class="form-control @error('athlete2_id') is-invalid @form-control" id="athlete2_id" name="athlete2_id">
            <option value="">Select Athlete</option>
            @foreach ($athletes as $athlete)
            <option value="{{ $athlete->id }}" {{ old('athlete2_id', $combat->athlete2_id) == $athlete->id ? 'selected' : '' }}>{{ $athlete->nom }} {{ $athlete->prenom }}</option>
            @endforeach
        </select>
        @error('athlete2_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="vainqueur_id" class="form-label">Winner</label>
        <select class="form-control @error('vainqueur_id') is-invalid @form-control" id="vainqueur_id" name="vainqueur_id">
            <option value="">Select Winner</option>
            @foreach ($athletes as $athlete)
            <option value="{{ $athlete->id }}" {{ old('vainqueur_id', $combat->vainqueur_id) == $athlete->id ? 'selected' : '' }}>{{ $athlete->nom }} {{ $athlete->prenom }}</option>
            @endforeach
        </select>
        @error('vainqueur_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="heure" class="form-label">Time</label>
        <input type="time" class="form-control @error('heure') is-invalid @enderror" id="heure" name="heure" value="{{ old('heure', $combat->heure) }}">
        @error('heure')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="resultat" class="form-label">Result</label>
        <input type="text" class="form-control @error('resultat') is-invalid @enderror" id="resultat" name="resultat" value="{{ old('resultat', $combat->resultat) }}">
        @error('resultat')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="performance" class="form-label">Performance</label>
        <textarea class="form-control @error('performance') is-invalid @form-control" id="performance" name="performance">{{ old('performance', $combat->performance) }}</textarea>
        @error('performance')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="type_combat" class="form-label">Fight Type</label>
        <select class="form-control @error('type_combat') is-invalid @form-control" id="type_combat" name="type_combat">
            <option value="">Select Fight Type</option>
            <option value="Pool Match" {{ old('type_combat', $combat->type_combat) == 'Pool Match' ? 'selected' : '' }}>Pool Match</option>
            <option value="Pool Final" {{ old('type_combat', $combat->type_combat) == 'Pool Final' ? 'selected' : '' }}>Pool Final</option>
            <option value="Overall Final" {{ old('type_combat', $combat->type_combat) == 'Overall Final' ? 'selected' : '' }}>Overall Final</option>
            <option value="Third Place" {{ old('type_combat', $combat->type_combat) == 'Third Place' ? 'selected' : '' }}>Third Place</option>
        </select>
        @error('type_combat')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('combats.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
