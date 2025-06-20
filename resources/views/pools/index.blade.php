@extends('layouts.app')

@section('content')
<h1>Pools</h1>
<a href="{{ route('pools.create') }}" class="btn btn-primary mb-3">Create Pool</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Competition</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pools as $pool)
            <tr>
                <td>{{ $pool->id }}</td>
                <td>{{ $pool->nom }}</td>
                <td>{{ $pool->competition->nom }}</td>
                <td>
                    <a href="{{ route('pools.edit', $pool) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('pools.assign', $pool) }}" class="btn btn-sm btn-secondary">Assign Athletes</a>
                    <form action="{{ route('pools.destroy', $pool) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    @endforeach
</table>
@endsection
