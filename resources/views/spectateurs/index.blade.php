@extends('layouts.app')

@section('content')
<h1>Spectators</h1>
<a href="{{ route('spectateurs.create') }}" class="btn btn-primary mb-3">Create Spectator</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Live Access</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($spectateurs as $spectateur)
            <tr>
                <td>{{ $spectateur->id }}</td>
                <td>{{ $spectateur->nom }}</td>
                <td>{{ $spectateur->email }}</td>
                <td>{{ $spectateur->acces_live ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('spectateurs.edit', $spectateur) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('spectateurs.destroy', $spectateur) }}" method="POST" class="d-inline">
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
