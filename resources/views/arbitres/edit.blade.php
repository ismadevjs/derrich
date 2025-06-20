@extends('layouts.app')

@section('content')
<h1>Edit Referee</h1>
<form action="{{ route('arbitres.update', $arbitre) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $arbitre->nom) }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">First Name</label>
        <input type="text" name="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom', $arbitre->prenom) }}">
        @error('prenom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="pays" class="form-label">Country</label>
        <input type="text" name="pays" id="pays" class="form-control @error('pays') is-invalid @enderror" value="{{ old('pays', $arbitre->pays) }}">
        @error('pays')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="wilaya" class="form-label">Wilaya</label>
        <input type="text" name="wilaya" id="wilaya" class="form-control @error('wilaya') is-invalid @enderror" value="{{ old('wilaya', $arbitre->wilaya) }}">
        @error('wilaya')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="club_id" class="form-label">Club</label>
        <select name="club_id" id="club_id" class="form-control @error('club_id') is-invalid @enderror">
            <option value="">Select Club</option>
            @foreach ($clubs as $club)
                <option value="{{ $club->id }}" {{ old('club_id', $arbitre->club_id) == $club->id ? 'selected' : '' }}>{{ $club->nom }}</option>
            @endforeach
        </select>
        @error('club_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="groupage" class="form-label">Blood Group</label>
        <input type="text" name="groupage" id="groupage" class="form-control @error('groupage') is-invalid @enderror" value="{{ old('groupage', $arbitre->groupage) }}">
        @error('groupage')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="niveau" class="form-label">Referee Level</label>
        <input type="text" name="niveau" id="niveau" class="form-control @error('niveau') is-invalid @enderror" value="{{ old('niveau', $arbitre->niveau) }}">
        @error('niveau')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
        @if ($arbitre->photo)
            <img src="{{ asset('storage/' . $arbitre->photo) }}" alt="{{ $arbitre->nom }}" width="100" class="mt-2">
        @endif
        @error('photo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('arbitres.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
