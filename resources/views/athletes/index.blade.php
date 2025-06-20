@extends('layouts.app')

@section('content')
<h1>Athletes</h1>
<a href="{{ route('athletes.create') }}" class="btn btn-primary mb-3">Add Athlete</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Club</th>
            <th>Weight</th>
            <th>Category</th>
            <th>Medical Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($athletes as $athlete)
            <tr>
                <td>{{ $athlete->id }}</td>
                <td>
                    @if ($athlete->photo)
                        <img src="{{ asset('storage/' . $athlete->photo) }}" alt="{{ $athlete->nom }}" width="50">
                    @endif
                </td>
                <td>{{ $athlete->nom }} {{ $athlete->prenom }}</td>
                <td>{{ $athlete->club->nom }}</td>
                <td>{{ $athlete->poids }}</td>
                <td>{{ $athlete->categorie }}</td>
                <td>{{ $athlete->medical_status }}</td>
                <td>
                    <a href="{{ route('athletes.edit', $athlete) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('athletes.destroy', $athlete) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
