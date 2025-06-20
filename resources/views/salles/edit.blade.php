@extends('layouts.app')

@section('content')
<h1>Add Venue</h1>
<form action="{{ route('salles.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="adresse" class="form-label">Address</label>
        <textarea name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror">{{ old('adresse') }}</textarea>
        @error('adresse')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('salles.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
