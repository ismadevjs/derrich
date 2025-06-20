@extends('layouts.app')

@section('content')

<a href="{{ route('clubs.create') }}" class="btn btn-primary mb-3">Add Club</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Wilaya</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clubs as $club)
            <tr>
                <td>{{ $club->id }}</td>
                <td>{{ $club->nom }}</td>
                <td>{{ $club->wilaya }}</td>
                <td>{{ $club->adresse }}</td>
                <td>
                    <a href="{{ route('clubs.edit', $club) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('clubs.destroy', $club) }}" method="POST" class="d-inline">
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
