@extends('base')

@section('title', 'Accueil Jeux Logico-mathématiques')

@section('content')
    <h1>Jeux Logico-mathématiques</h1>
    <a href="{{route('homepage.login')}}">Login</a>
    <a href="{{route('homepage.newAccount')}}">New Account</a>
    <form action="" method="post">
        @csrf
        <!-- Champ pour mdp de classe, type number pour que les enfants voient ce qu'ils tapent -->
        <input type="password" name="class_code">
        <button>Valider</button>
    </form>
@endsection