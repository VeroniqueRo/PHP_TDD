<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project detail</title>

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
            Détail du Projet
        </div>
        <div>
            <h1>{{$projects->ProjectTitle}}</h1>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Description</th>
                    <th>Auteur</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$projects->Descriptive}}</td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="links">
            <a href="{{ url('/')}}">Home</a>
            <a href="{{ route('ListeDesProjets')}}">Liste des Projets</a>
            <a href="https://laravel.com/docs">Documentation</a>
        </div>
    </div>
</div>
</body>
</html>
