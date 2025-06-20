@extends('layouts.app')

@section('content')
<h1>Create Fight</h1>
<form action="{{ route('combats.store') }}" method="POST">
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
        <label for="athlete1_id" class="form-label">Athlete 1</label>
        <select class="form-control @error('athlete1_id') is-invalid @enderror" id="athlete1_id" name="athlete1_id">
            <option value="">Select Athlete</option>
            @foreach ($athletes as $athlete)
                <option value="{{ $athlete->id }}" {{ old('athlete1_id') == $athlete->id ? 'selected' : '' }}>{{ $athlete->nom }} {{ $athlete->prenom }}</option>
            @endforeach
        </select>
        @error('athlete1_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="athlete2_id" class="form-label">Athlete 2</label>
        <select class="form-control @error('athlete2_id') is-invalid @enderror" id="athlete2_id" name="athlete2_id">
            <option value="">Select Athlete</option>
            @foreach ($athletes as $athlete)
                <option value="{{ $athlete->id }}" {{ old('athlete2_id') == $athlete->id ? 'selected' : '' }}>{{ $athlete->nom }} {{ $athlete->prenom }}</option>
            @endforeach
        </select>
        @error('athlete2_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="heure" class="form-label">Time</label>
        <input type="time" class="form-control @error('heure') is-invalid @enderror" id="heure" name="heure" value="{{ old('heure') }}">
        @error('heure')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="type_combat" class="form-label">Fight Type</label>
        <select class="form-control @error('type_combat') is-invalid @enderror" id="type_combat" name="type_combat">
            <option value="">Select Fight Type</option>
            <option value="Pool Match" {{ old('type_combat') == 'Pool Match' ? 'selected' : '' }}>Pool Match</option>
            <option value="Pool Final" {{ old('type_combat') == 'Pool Final' ? 'selected' : '' }}>Pool Final</option>
            <option value="Overall Final" {{ old('type_combat') == 'Overall Final' ? 'selected' : '' }}>Overall Final</option>
            <option value="Third Place" {{ old('type_combat') == 'Third Place' ? 'selected' : '' }}>Third Place</option>
        </select>
        @error('type_combat')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('combats.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
