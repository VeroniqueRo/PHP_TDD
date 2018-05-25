@extends('layouts.app')

@section('content')
    @if ( $project->user_id === Auth::user()->id)
        <div>
            <h1>Bonjour {{$project->user->name}}<br>Vous pouvez modifier votre projet :</h1>
            <h3>"{{$project->ProjectTitle}}" - Créé le {{$project->created_at->format('d/m/Y')}}</h3><br>
        </div>
        <table class="table table-hover table-bordered .table-responsive">
            <tbody>
            <form class="" action="{{route('modifProjet', [$project->id])}}" method="post">
                {{ csrf_field() }} {{-- Protection contre les attaques d'injection SQL--}}
                {{--  Méthode LARAVEL Equivalante à <input type="hidden" name="_token" value="clé de sécurité">--}}
                {{ method_field('PUT') }}
                {{--  Méthode LARAVEL Equivalante à <input type="hidden" name="_method" value="PUT">--}}
                <div class="form-group">
                    <label for="projecttitle">Nouveau titre de votre projet</label>
                    <input type="text" class="form-control" value="{{$project->ProjectTitle}}" name="newprojecttitle"
                           placeholder="entrer le nouveau titre du projet">
                </div>
                <div class="form-group">
                    <label for="projectdescriptive" name="projectdescriptive">Nouveau descriptif de votre
                        projet</label>
                    <input type="text" class="form-control" value="{{$project->Descriptive}}"
                           name="newprojectdescriptive"
                           placeholder="entrer le nouveau descriptif du projet">
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

    @else

        <h1>Attention {{ Auth::user()->name }}</h1>
        <div class="alert alert-danger">
            Vous ne pouvez pas modifier ce projet
        </div>
        <a href="{{ route('ListeDesProjets')}}">
            <button type="button" class="btn btn-info">Retour</button>
    @endif

@endsection