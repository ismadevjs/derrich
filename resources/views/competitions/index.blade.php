@extends('layouts.app')

@section('content')
<h1>Competitions</h1>
<a href="{{ route('competitions.create') }}" class="btn btn-primary mb-3">Add Competition</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Venue</th>
            <th>Mat</th>
            <th>Referee</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($competitions as $competition)
            <tr>
                <td>{{ $competition->id }}</td>
                <td>{{ $competition->nom }}</td>
                <td>{{ $competition->date }}</td>
                <td>{{ $competition->salle->nom }}</td>
                <td>{{ $competition->tapis->nom }}</td>
                <td>{{ $competition->arbitre->nom }} {{ $competition->arbitre->prenom }}</td>
                <td>
                    <a href="{{ route('competitions.edit', $competition) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('competitions.destroy', $competition) }}" method="POST" class="d-inline">
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
