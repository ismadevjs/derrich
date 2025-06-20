@extends('layouts.app')

@section('content')
<h1>Referees</h1>
<a href="{{ route('arbitres.create') }}" class="btn btn-primary mb-3">Add Referee</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Club</th>
            <th>Blood Group</th>
            <th>Level</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($arbitres as $arbitre)
            <tr>
                <td>{{ $arbitre->id }}</td>
                <td>
                    @if ($arbitre->photo)
                        <img src="{{ asset('storage/' . $arbitre->photo) }}" alt="{{ $arbitre->nom }}" width="50">
                    @endif
                </td>
                <td>{{ $arbitre->nom }} {{ $arbitre->prenom }}</td>
                <td>{{ $arbitre->club->nom }}</td>
                <td>{{ $arbitre->groupage }}</td>
                <td>{{ $arbitre->niveau }}</td>
                <td>
                    <a href="{{ route('arbitres.edit', $arbitre) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('arbitres.destroy', $arbitre) }}" method="POST" class="d-inline">
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
