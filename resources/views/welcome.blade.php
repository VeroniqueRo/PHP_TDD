@extends('layouts.app')
@section('titre')
    Donnez vie à vos projets !
@endsection
@section('content')
    <a href={{ route('FormAjoutUnProjet') }}><img class="imageProjet" alt="image projet" src="../image/image-projet.jpg"/></a>
@endsection
