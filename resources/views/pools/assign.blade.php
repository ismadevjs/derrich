@extends('layouts.app')

@section('content')
<h1>Assign Athletes to Pool: {{ $pool->nom }}</h1>
<form action="{{ route('pools.storeAthletes', $pool) }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="athlete_ids" class="form-label">Athletes</label>
        <select multiple class="form-control @error('athlete_ids') is-invalid @form-control" id="athlete_ids" name="athlete_ids[]">
            @foreach ($athletes as $athlete)
            <option value="{{ $athlete->id }}" {{ in_array($athlete->id, old('athlete_ids', $pool->athletes->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $athlete->nom }} {{ $athlete->prenom }}</option>
            @endforeach
        </select>
        @error('athlete_ids')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Assign</button>
    <a href="{{ route('pools.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
