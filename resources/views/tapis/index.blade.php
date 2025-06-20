@extends('layouts.app')

@section('content')
<h1>Mats</h1>
<a href="{{ route('tapis.create') }}" class="btn btn-primary mb-3">Add Mat</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Venue</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tapis as $tapis)
            <tr>
                <td>{{ $tapis->id }}</td>
                <td>{{ $tapis->nom }}</td>
                <td>{{ $tapis->salle->nom }}</td>
                <td>
                    <a href="{{ route('tapis.edit', $tapis) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('tapis.destroy', $tapis) }}" method="POST" class="d-inline">
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
