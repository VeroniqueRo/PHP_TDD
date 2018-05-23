@extends('layouts.app')
@section('titre')
    <h1>Bonjour {{ Auth::user()->name }}</h1>
    Ajoutez votre Projet
@endsection
@section('content')
    <form class="" action="{{route('AjoutUnProjet')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="projecttitle" name="projecttitle">Titre du Projet</label>
            <input type="text" class="form-control" name="projecttitle" placeholder="entrer le titre du Projet">
        </div>
        <div class="form-group">
            <label for="projectdescriptive" name="projectdescriptive">Description du Projet</label>
            <input type="text" class="form-control" name="projectdescriptive" placeholder="entrer la description du projet">
        </div>
        <button type="submit" class="btn btn-success">Ajouter le Projet</button>
        <a href="{{ route('ListeDesProjets')}}">
            <button type="button" class="btn btn-info">Annuler</button>
        </a>
        <hr>
    </form>
@endsection