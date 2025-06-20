@extends('layouts.app')

@section('content')
<h1>Edit Pool</h1>
<form action="{{ route('pools.update', $pool) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="nom" class="form-label">Name</label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $pool->nom) }}">
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="competition_id" class="form-label">Competition</label>
        <select class="form-control @error('competition_id') is-invalid @form-control" id="competition_id" name="competition_id">
            <option value="">Select Competition</option>
            @foreach ($competitions as $competition)
            <option value="{{ $competition->id }}" {{ old('competition_id', $pool->competition_id) == $competition->id ? 'selected' : '' }}>{{ $competition->nom }}</option>
            @endforeach
        </select>
        @error('competition_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('pools.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
