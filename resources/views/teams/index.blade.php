@extends('layouts.app')

@section('content')
<h1>Teams</h1>
<a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Add Team</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Club</th>
            <th>Coach</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>{{ $team->nom }}</td>
                <td>{{ $team->club->nom }}</td>
                <td>{{ $team->coach->nom }} {{ $team->coach->prenom }}</td>
                <td>
                    <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('teams.destroy', $team) }}" method="POST" class="d-inline">
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
