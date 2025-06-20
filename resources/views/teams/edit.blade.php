@extends('layouts.app')

@section('content')
<h1>Edit Team</h1>
<form action="{{ route('teams.update', $team) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $team->nom) }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="club_id" class="form-label">Club</label>
        <select name="club_id" id="club_id" class="form-control @error('club_id') is-invalid @enderror">
            <option value="">Select Club</option>
            @foreach ($clubs as $club)
                <option value="{{ $club->id }}" {{ old('club_id', $team->club_id) == $club->id ? 'selected' : '' }}>{{ $club->nom }}</option>
            @endforeach
        </select>
        @error('club_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="coach_id" class="form-label">Coach</label>
        <select name="coach_id" id="coach_id" class="form-control @error('coach_id') is-invalid @enderror">
            <option value="">Select Coach</option>
            @foreach ($coachs as $coach)
                <option value="{{ $coach->id }}" {{ old('coach_id', $team->coach_id) == $coach->id ? 'selected' : '' }}>{{ $coach->nom }} {{ $coach->prenom }}</option>
            @endforeach
        </select>
        @error('coach_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('teams.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
