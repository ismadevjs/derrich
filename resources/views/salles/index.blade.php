@extends('layouts.app')

@section('content')
<h1>Venues</h1>
<a href="{{ route('salles.create') }}" class="btn btn-primary mb-3">Add Venue</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($salles as $salle)
            <tr>
                <td>{{ $salle->id }}</td>
                <td>{{ $salle->nom }}</td>
                <td>{{ $salle->adresse }}</td>
                <td>
                    <a href="{{ route('salles.edit', $salle) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('salles.destroy', $salle) }}" method="POST" class="d-inline">
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
