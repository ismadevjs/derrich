@extends('layouts.app')

@section('content')
<h1>Rankings</h1>
<a href="{{ route('rankings.create') }}" class="btn btn-primary mb-3">Create Ranking</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Competition</th>
            <th>Athlete</th>
            <th>Weight</th>
            <th>Rank</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rankings as $ranking)
            <tr>
                <td>{{ $ranking->id }}</td>
                <td>{{ $ranking->competition->nom }}</td>
                <td>{{ $ranking->athlete->nom }} {{ $ranking->athlete->prenom }}</td>
                <td>{{ $ranking->poids }}</td>
                <td>{{ $ranking->rang }}</td>
                <td>
                    <a href="{{ route('rankings.edit', $ranking) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('rankings.destroy', $ranking) }}" method="POST" class="d-inline">
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
