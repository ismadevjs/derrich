@extends('layouts.app')

@section('content')
<form action="{{ route('coachs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">First Name</label>
        <input type="text" name="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}">
        @error('prenom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="pays" class="form-label">Country</label>
        <input type="text" name="pays" id="pays" class="form-control @error('pays') is-invalid @enderror" value="{{ old('pays') }}">
        @error('pays')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="wilaya" class="form-label">Wilaya</label>
        <input type="text" name="wilaya" id="wilaya" class="form-control @error('wilaya') is-invalid @enderror" value="{{ old('wilaya') }}">
        @error('wilaya')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="club_id" class="form-label">Club</label>
        <select name="club_id" id="club_id" class="form-control @error('club_id') is-invalid @enderror">
            <option value="">Select Club</option>
            @foreach ($clubs as $club)
                <option value="{{ $club->id }}" {{ old('club_id') == $club->id ? 'selected' : '' }}>{{ $club->nom }}</option>
            @endforeach
        </select>
        @error('club_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('coachs.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
