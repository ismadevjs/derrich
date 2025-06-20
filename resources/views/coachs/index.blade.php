@extends('layouts.app')

@section('content')

<a href="{{ route('coachs.create') }}" class="btn btn-primary mb-3">Add Coach</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Club</th>
            <th>Country</th>
            <th>Wilaya</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($coachs as $coach)
            <tr>
                <td>{{ $coach->id }}</td>
                <td>{{ $coach->nom }} {{ $coach->prenom }}</td>
                <td>{{ $coach->club->nom }}</td>
                <td>{{ $coach->pays }}</td>
                <td>{{ $coach->wilaya }}</td>
                <td>
                    <a href="{{ route('coachs.edit', $coach) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('coachs.destroy', $coach) }}" method="POST" class="d-inline">
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
