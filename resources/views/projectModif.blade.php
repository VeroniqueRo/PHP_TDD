@extends('layouts.app')
@section('titre')
    <h1>Modifier le projet</h1>
    {{$projetAModifier->ProjectTitle}}<br>
    <h1>Auteur : {{$projetAModifier->user->name}}</h1>

@endsection
@section('content')
    <table class="table table-hover table-bordered .table-responsive">
        <tbody>
        <form class="" action="{{route('modifProjet', [$projetAModifier->id])}}" method="post">
            {{ csrf_field() }} {{-- Protection contre les attaques d'injection SQL--}}
            {{--  Méthode LARAVEL Equivalante à <input type="hidden" name="_token" value="clé de sécurité">--}}
            {{ method_field('PUT') }}
            {{--  Méthode LARAVEL Equivalante à <input type="hidden" name="_method" value="PUT">--}}
            <div class="form-group">
                <label for="projecttitle">Titre du Projet</label>
                <input type="text" class="form-control" value="{{$projetAModifier->nom}}" name="newprojecttitle" placeholder="entrer le nouveau titre du projet">
            </div>
            <div class="form-group">
                <label for="projectdescriptive" name="projectdescriptive">Descriptif du Projet </label>
                <input type="text" class="form-control" value="{{$projetAModifier->prix}}" name="newprojectdescriptive" placeholder="entrer le nouveau descriptif du projet">
            </div>
            <button type="submit" class="btn btn-warning">Modifier</button>
        </form>
        <tr>
            <a href="{{ route('ListeDesProjets')}}">
                <button type="button" class="btn btn-info">Annuler</button>
            </a>
        </tr>
        </tbody>
    </table>
@endsection