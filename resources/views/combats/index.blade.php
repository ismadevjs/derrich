@extends('layouts.app')

@section('content')
<h1>Fights</h1>
<a href="{{ route('combats.create') }}" class="btn btn-primary mb-3">Create Fight</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Competition</th>
            <th>Athlete 1</th>
            <th>Athlete 2</th>
            <th>Winner</th>
            <th>Time</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($combats as $combat)
            <tr>
                <td>{{ $combat->id }}</td>
                <td>{{ $combat->competition->nom }}</td>
                <td>{{ $combat->athlete1->nom }} {{ $combat->athlete1->prenom }}</td>
                <td>{{ $combat->athlete2->nom }} {{ $combat->athlete2->prenom }}</td>
                <td>{{ $combat->vainqueur ? $combat->vainqueur->nom . ' ' . $combat->vainqueur->prenom : 'N/A' }}</td>
                <td>{{ $combat->heure }}</td>
                <td>{{ $combat->type_combat }}</td>
                <td>
                    <a href="{{ route('combats.edit', $combat) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('combats.destroy', $combat) }}" method="POST" class="d-inline">
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
