@extends('layouts.app')

@section('content')
<h1>Notifications</h1>
<a href="{{ route('notifications.create') }}" class="btn btn-primary mb-3">Create Notification</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Type</th>
            <th>Message</th>
            <th>Date Sent</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notifications as $notification)
            <tr>
                <td>{{ $notification->id }}</td>
                <td>{{ $notification->user_id }}</td>
                <td>{{ $notification->type }}</td>
                <td>{{ $notification->message }}</td>
                <td>{{ $notification->date_envoi }}</td>
                <td>{{ $notification->statut }}</td>
                <td>
                    <a href="{{ route('notifications.edit', $notification) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('notifications.destroy', $notification) }}" method="POST" class="d-inline">
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
