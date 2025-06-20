@extends('layouts.app')

@section('content')
<h1>Edit Competition</h1>
<form action="{{ route('competitions.update', $competition) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $competition->nom) }}">
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $competition->date->format('Y-m-d\TH:i')) }}">
        @error('date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="salle_id" class="form-label">Venue</label>
        <select class="form-control @error('salle_id') is-invalid @form-control" id="salle_id" name="salle_id">
            <option value="">Select Venue</option>
            @foreach ($salles as $salle)
            <option value="{{ $salle->id }}" {{ old('salle_id', $competition->salle_id) == $salle->id ? 'selected' : '' }}>{{ $salle->nom }}</option>
            @endforeach
        </select>
        @error('salle_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="tapis_id" class="form-label">Mat</label>
        <select class="form-control @error('tapis_id') is-invalid @form-control" id="tapis_id" name="tapis_id">
            <option value="">Select Mat</option>
            @foreach ($tapis as $tapi)
            <option value="{{ $tapi->id }}" {{ old('tapis_id', $competition->tapis_id) == $tapi->id ? 'selected' : '' }}>{{ $tapi->nom }}</option>
            @endforeach
        </select>
        @error('tapis_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="arbitre_id" class="form-label">Referee</label>
        <select class="form-control @error('arbitre_id') is-invalid @form-control" id="arbitre_id" name="arbitre_id">
            <option value="">Select Referee</option>
            @foreach ($arbitres as $arbitre)
            <option value="{{ $arbitre->id }}" {{ old('arbitre_id', $competition->arbitre_id) == $arbitre->id ? 'selected' : '' }}>{{ $arbitre->nom }} {{ $arbitre->prenom }}</option>
            @endforeach
        </select>
        @error('arbitre_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('competitions.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
