@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome to {{ config('app.name') }}</h1>
    <p>Manage combat sports competitions with ease.</p>
    @auth
        <a href="{{ route('competitions.index') }}" class="btn btn-primary">View Competitions</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
        <a href="{{ route('live-results') }}" class="btn btn-info">Live Results</a>
    @endauth
</div>
@endsection
