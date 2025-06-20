@extends('layouts.app')

@section('content')

<form action="{{ route('clubs.update', $club) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $club->nom) }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="wilaya" class="form-label">Wilaya</label>
        <input type="text" name="wilaya" id="wilaya" class="form-control @error('wilaya') is-invalid @enderror" value="{{ old('wilaya', $club->wilaya) }}">
        @error('wilaya')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="adresse" class="form-label">Address</label>
        <textarea name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror">{{ old('adresse', $club->adresse) }}</textarea>
        @error('adresse')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
