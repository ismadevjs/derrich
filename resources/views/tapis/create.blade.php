@extends('layouts.app')

@section('content')
<h1>Add Mat</h1>
<form action="{{ route('tapis.store') }}" method="POST">
    @csrf
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
        <label for="nom" class="form-label">Name</label>
        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('tapis.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
