@extends('layouts.app')

@section('content')
<h1>Add Athlete</h1>
<form action="{{ route('athletes.store') }}" method="POST" enctype="multipart/form-data">
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
        <label for="date_naissance" class="form-label">Date of Birth</label>
        <input type="date" name="date_naissance" id="date_naissance" class="form-control @error('date_naissance') is-invalid @enderror" value="{{ old('date_naissance') }}">
        @error('date_naissance')
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
    <div class="mb-3">
        <label for="poids" class="form-label">Weight</label>
        <input type="text" name="poids" id="poids" class="form-control @error('poids') is-invalid @enderror" value="{{ old('poids') }}">
        @error('poids')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="categorie" class="form-label">Category</label>
        <select name="categorie" id="categorie" class="form-control @error('categorie') is-invalid @enderror">
            <option value="">Select Category</option>
            <option value="أصاغر" {{ old('categorie') == 'أصاغر' ? 'selected' : '' }}>Juniors</option>
            <option value="أواسط" {{ old('categorie') == 'أواسط' ? 'selected' : '' }}>Intermediates</option>
            <option value="أكابر" {{ old('categorie') == 'أكابر' ? 'selected' : '' }}>Seniors</option>
        </select>
        @error('categorie')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="groupage" class="form-label">Blood Group</label>
        <input type="text" name="groupage" id="groupage" class="form-control @error('groupage') is-invalid @enderror" value="{{ old('groupage') }}">
        @error('groupage')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="medical_status" class="form-label">Medical Status</label>
        <select name="medical_status" id="medical_status" class="form-control @error('medical_status') is-invalid @enderror">
            <option value="Cleared" {{ old('medical_status') == 'Cleared' ? 'selected' : '' }}>Cleared</option>
            <option value="Pending" {{ old('medical_status') == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Not Cleared" {{ old('medical_status') == 'Not Cleared' ? 'selected' : '' }}>Not Cleared</option>
        </select>
        @error('medical_status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
        @error('photo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="rapport_medical_pdf" class="form-label">Medical Report (PDF)</label>
        <input type="file" name="rapport_medical_pdf" id="rapport_medical_pdf" class="form-control @error('rapport_medical_pdf') is-invalid @enderror">
        @error('rapport_medical_pdf')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="cardiovasculaire" class="form-label">Cardiovascular Status</label>
        <input type="text" name="cardiovasculaire" id="cardiovasculaire" class="form-control @error('cardiovasculaire') is-invalid @enderror" value="{{ old('cardiovasculaire') }}">
        @error('cardiovasculaire')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('athletes.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
