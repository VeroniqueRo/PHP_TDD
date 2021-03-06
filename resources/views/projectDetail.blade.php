@extends('layouts.app')
@section('titre')
    <h1>Détail du Projet</h1>
    {{$project->ProjectTitle}}
@endsection
@section('content')
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Description</th>
            <th>Auteur</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$project->Descriptive}}</td>
            <td>{{$user->name}}</td>
        </tr>
        </tbody>
    </table>
    <a href="/projectModif/{{$project->id}}">
        <button type="button" class="btn btn-success">Modifier</button>
    </a>
    <a href="{{ route('ListeDesProjets')}}">
        <button type="button" class="btn btn-info">Annuler</button>
    </a>
@endsection