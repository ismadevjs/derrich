@extends('layouts.app')

@section('content')
<h1>Create Ranking</h1>
<form action="{{ route('rankings.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="competition_id" class="form-label">Competition</label>
        <select class="form-control @error('competition_id') is-invalid @enderror" id="competition_id" name="competition_id">
            <option value="">Select Competition</option>
            @foreach ($competitions as $competition)
                <option value="{{ $competition->id }}" {{ old('competition_id') == $competition->id ? 'selected' : '' }}>{{ $competition->nom }}</option>
            @endforeach
        </select>
        @error('competition_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="athlete_id" class="form-label">Athlete</label>
        <select class="form-control @error('athlete_id') is-invalid @enderror" id="athlete_id" name="athlete_id">
            <option value="">Select Athlete</option>
            @foreach ($athletes as $athlete)
                <option value="{{ $athlete->id }}" {{ old('athlete_id') == $athlete->id ? 'selected' : '' }}>{{ $athlete->nom }} {{ $athlete->prenom }}</option>
            @endforeach
        </select>
        @error('athlete_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="poids" class="form-label">Weight</label>
        <input type="text" class="form-control @error('poids') is-invalid @enderror" id="poids" name="poids" value="{{ old('poids') }}">
        @error('poids')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="rang" class="form-label">Rank</label>
        <input type="number" class="form-control @error('rang') is-invalid @enderror" id="rang" name="rang" value="{{ old('rang') }}">
        @error('rang')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('rankings.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
