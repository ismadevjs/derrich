@extends('layouts.app')

@section('content')
<h1>Create Notification</h1>
<form action="{{ route('notifications.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="user_id" class="form-label">User ID</label>
        <input type="number" class="form-control @error('user_id') is-invalid @form-control" id="user_id" name="user_id" value="{{ old('user_id') }}">
        @error('user_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-control @error('type') is-invalid @form-control" id="type" name="type">
            <option value="">Select Type</option>
            <option value="Invitation" {{ old('type') == 'Invitation' ? 'selected' : '' }}>Invitation</option>
            <option value="Schedule" {{ old('type') == 'Schedule' ? 'selected' : '' }}>Schedule</option>
            <option value="Result" {{ old('type') == 'Result' ? 'selected' : '' }}>Result</option>
        </select>
        @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control @error('message') is-invalid @form-control" id="message" name="message">{{ old('message') }}</textarea>
        @error('message')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="date_envoi" class="form-label">Date Sent</label>
        <input type="datetime-local" class="form-control @error('date_envoi') is-invalid @form-control" id="date_envoi" name="date_envoi" value="{{ old('date_envoi') }}">
        @error('date_envoi')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="statut" class="form-label">Status</label>
        <select class="form-control @error('statut') is-invalid @form-control" id="statut" name="statut">
            <option value="">Select Status</option>
            <option value="Sent" {{ old('statut') == 'Sent' ? 'selected' : '' }}>Sent</option>
            <option value="Read" {{ old('statut') == 'Read' ? 'selected' : '' }}>Read</option>
        </select>
        @error('statut')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
