@extends('layouts.app')

@section('content')
<h1>Live Fight Results</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Competition</th>
            <th>Athlete 1</th>
            <th>Athlete 2</th>
            <th>Winner</th>
            <th>Result</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($combats as $combat)
            <tr>
                <td>{{ $combat->competition->nom }}</td>
                <td>{{ $combat->athlete1->nom }} {{ $combat->athlete1->prenom }}</td>
                <td>{{ $combat->athlete2->nom }} {{ $combat->athlete2->prenom }}</td>
                <td>{{ $combat->vainqueur ? $combat->vainqueur->nom . ' ' . $combat->vainqueur->prenom : 'N/A' }}</td>
                <td>{{ $combat->resultat ?? 'Pending' }}</td>
                <td>{{ $combat->type_combat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
