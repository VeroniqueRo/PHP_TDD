@extends('layouts.app')
@section('titre')
    <h1>Listes des projets</h1>
    Projets en cours de financement
@endsection
@section('content')
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Titre du Projet</th>
            <th>Auteur</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td><a href="/project/{{$project->id}}">{{$project->ProjectTitle}}</td>
                <td>{{$project->user->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection