@extends('layouts.app')

@section('content')
<h1>Add Competition</h1>
<form action="{{ route('competitions.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="datetime-local" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
        @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="salle_id" class="form-label">Venue</label>
        <select name="salle_id" id="salle_id" class="form-control @error('salle_id') is-invalid @enderror">
            <option value="">Select Venue</option>
            @foreach ($salles as $salle)
                <option value="{{ $salle->id }}" {{ old('salle_id') == $salle->id ? 'selected' : '' }}>{{ $salle->nom }}</option>
            @endforeach
        </select>
        @error('salle_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="tapis_id" class="form-label">Mat</label>
        <select name="tapis_id" id="tapis_id" class="form-control @error('tapis_id') is-invalid @enderror">
            <option value="">Select Mat</option>
            @foreach ($tapis as $tapis)
                <option value="{{ $tapis->id }}" {{ old('tapis_id') == $tapis->id ? 'selected' : '' }}>{{ $tapis->nom }}</option>
            @endforeach
        </select>
        @error('tapis_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="arbitre_id" class="form-label">Referee</label>
        <select name="arbitre_id" id="arbitre_id" class="form-control @error('arbitre_id') is-invalid @enderror">
            <option value="">Select Referee</option>
            @foreach ($arbitres as $arbitre)
                <option value="{{ $arbitre->id }}" {{ old('arbitre_id') == $arbitre->id ? 'selected' : '' }}>{{ $arbitre->nom }} {{ $arbitre->prenom }}</option>
            @endforeach
        </select>
        @error('arbitre_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('competitions.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
