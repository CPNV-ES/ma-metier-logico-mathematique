@extends('base')

@section('title', 'Accueil Jeux Logico-mathématiques')

@section('content')
    <h1>Jeux Logico-mathématiques</h1>
    <a href="{{route('homepage.login')}}">Login</a>
    <a href="{{route('homepage.newAccount')}}">New Account</a>
    <a href="{{route('homepage.classes')}}">Classe</a>
@endsection