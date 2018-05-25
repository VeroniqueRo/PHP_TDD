@extends('layouts.app')
@section('titre')
    <h1>Attention {{ Auth::user()->name }}</h1>
@endsection
@section('content')
    <div class="alert alert-danger" >
        Vous ne pourvez pas modifier ce projet
    </div >
    <a href="{{ route('ListeDesProjets')}}">
        <button type="button" class="btn btn-info">Retour</button>
    </a>
@endsection