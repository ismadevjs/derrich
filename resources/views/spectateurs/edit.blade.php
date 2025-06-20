@extends('layouts.app')

@section('content')
<h1>Edit Spectator</h1>
<form action="{{ route('spectateurs.update', $spectateur) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="text" class="form-control @error('nom') is-invalid @form-control" id="nom" name="nom" value="{{ old('nom', $spectateur->nom) }}">
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @form-control" id="email" name="email" value="{{ old('email', $spectateur->email) }}">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="acces_live" class="form-check-label">Live Access</label>
        <input type="checkbox" class="form-check-input @error('acces_live') is-invalid @form-check-input" id="acces_live" name="acces_live" {{ old('acces_live', $spectateur->acces_live) ? 'checked' : '' }}>
        @error('acces_live')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('spectateurs.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
