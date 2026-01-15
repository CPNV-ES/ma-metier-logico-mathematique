@extends('base')

@section('title', 'Accueil Jeux Logico-mathématiques')

@section('content')
    <h1>Jeux Logico-mathématiques</h1>
    <a href="{{route('accueil.login')}}">Login</a>
    <a href="{{route('accueil.newAccount')}}">New Account</a>
    <a href="{{route('accueil.classe')}}">Classe</a>
@endsection