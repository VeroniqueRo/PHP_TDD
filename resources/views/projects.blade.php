<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Projets en cours
        </div>
        <div>
            <h1>Listes des projets</h1>
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
                        <td>{{$project->user_id}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="links">
            <a href="{{ url('/')}}">Home</a>
            <a href="{{ route('ListeDesProjets')}}">Liste des Projets</a>
            <a href="https://laravel.com/docs">Documentation Laravel</a>
            <a href="https://laravel.sillo.org/creer-une-application-avec-laravel-5-5-les-tests/">laravel.sillo.org</a>
        </div>
    </div>
</div>
</body>
</html>