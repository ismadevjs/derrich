@extends('layouts.app')

@section('content')
<h1>Create Spectator</h1>
<form action="{{ route('spectateurs.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <div class="form-check">
            <input type="checkbox" class="form-check-input @error('acces_live') is-invalid @enderror" id="acces_live" name="acces_live" {{ old('acces_live') ? 'checked' : '' }}>
            <label for="acces_live" class="form-check-label">Live Access</label>
            @error('acces_live')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('spectateurs.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
