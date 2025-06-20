@extends('layouts.app')

@section('content')
<h1>Edit Athlete</h1>
<form action="{{ route('athletes.update', $athlete) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $athlete->nom) }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">First Name</label>
        <input type="text" name="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom', $athlete->prenom) }}">
        @error('prenom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="date_naissance" class="form-label">Date of Birth</label>
        <input type="date" name="date_naissance" id="date_naissance" class="form-control @error('date_naissance') is-invalid @enderror" value="{{ old('date_naissance', $athlete->date_naissance) }}">
        @error('date_naissance')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="pays" class="form-label">Country</label>
        <input type="text" name="pays" id="pays" class="form-control @error('pays') is-invalid @enderror" value="{{ old('pays', $athlete->pays) }}">
        @error('pays')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="wilaya" class="form-label">Wilaya</label>
        <input type="text" name="wilaya" id="wilaya" class="form-control @error('wilaya') is-invalid @enderror" value="{{ old('wilaya', $athlete->wilaya) }}">
        @error('wilaya')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="club_id" class="form-label">Club</label>
        <select name="club_id" id="club_id" class="form-control @error('club_id') is-invalid @enderror">
            <option value="">Select Club</option>
            @foreach ($clubs as $club)
                <option value="{{ $club->id }}" {{ old('club_id', $athlete->club_id) == $club->id ? 'selected' : '' }}>{{ $club->nom }}</option>
            @endforeach
        </select>
        @error('club_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="poids" class="form-label">Weight</label>
        <input type="text" name="poids" id="poids" class="form-control @error('poids') is-invalid @enderror" value="{{ old('poids', $athlete->poids) }}">
        @error('poids')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="categorie" class="form-label">Category</label>
        <select name="categorie" id="categorie" class="form-control @error('categorie') is-invalid @enderror">
            <option value="">Select Category</option>
            <option value="أصاغر" {{ old('categorie', $athlete->categorie) == 'أصاغر' ? 'selected' : '' }}>Juniors</option>
            <option value="أواسط" {{ old('categorie', $athlete->categorie) == 'أواسط' ? 'selected' : '' }}>Intermediates</option>
            <option value="أكابر" {{ old('categorie', $athlete->categorie) == 'أكابر' ? 'selected' : '' }}>Seniors</option>
        </select>
        @error('categorie')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="groupage" class="form-label">Blood Group</label>
        <input type="text" name="groupage" id="groupage" class="form-control @error('groupage') is-invalid @enderror" value="{{ old('groupage', $athlete->groupage) }}">
        @error('groupage')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="medical_status" class="form-label">Medical Status</label>
        <select name="medical_status" id="medical_status" class="form-control @error('medical_status') is-invalid @enderror">
            <option value="Cleared" {{ old('medical_status', $athlete->medical_status) == 'Cleared' ? 'selected' : '' }}>Cleared</option>
            <option value="Pending" {{ old('medical_status', $athlete->medical_status) == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Not Cleared" {{ old('medical_status', $athlete->medical_status) == 'Not Cleared' ? 'selected' : '' }}>Not Cleared</option>
        </select>
        @error('medical_status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
        @if ($athlete->photo)
            <img src="{{ asset('storage/' . $athlete->photo) }}" alt="{{ $athlete->nom }}" width="100" class="mt-2">
        @endif
        @error('photo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="rapport_medical_pdf" class="form-label">Medical Report (PDF)</label>
        <input type="file" name="rapport_medical_pdf" id="rapport_medical_pdf" class="form-control @error('rapport_medical_pdf') is-invalid @enderror">
        @if ($athlete->rapport_medical_pdf)
            <a href="{{ asset('storage/' . $athlete->rapport_medical_pdf) }}" target="_blank" class="mt-2 d-block">View Current Report</a>
        @endif
        @error('rapport_medical_pdf')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="cardiovasculaire" class="form-label">Cardiovascular Status</label>
        <input type="text" name="cardiovasculaire" id="cardiovasculaire" class="form-control @error('cardiovasculaire') is-invalid @enderror" value="{{ old('cardiovasculaire', $athlete->cardiovasculaire) }}">
        @error('cardiovasculaire')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('athletes.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
