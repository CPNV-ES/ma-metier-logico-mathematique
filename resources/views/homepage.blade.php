@extends('base')

@section('title', 'Accueil Jeux Logico-mathématiques')

@section('content')
    <h1>Jeux Logico-mathématiques</h1>
    <a href="{{route('homepage.login')}}">Login</a>
    <a href="{{route('homepage.newAccount')}}">New Account</a>
    <a href="{{route('homepage.classes')}}">Classe</a>
    <form action="" method="post">
        @csrf
        <!-- Champ pour mdp de classe, type number pour que les enfants voient ce qu'ils tapent -->
        <input type="number" name="ClassCode">
        <button>Valider</button>
    </form>
@endsection