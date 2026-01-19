@extends('base')

@section('title', 'Accueil Jeux Logico-mathématiques')

@section('content')
    <h1>Jeux Logico-mathématiques</h1>
    <a href="{{ route('teacher.login') }}">Login</a>
    <a href="{{ route('teacher.register') }}">New Account</a>
    <form action="" method="post">
        @csrf
        <div>
            <!-- Champ pour mdp de classe, type number pour que les enfants voient ce qu'ils tapent -->
            <input type="text" name="class_code">
            <!-- Affichage d'erreur -->
            @error("class_code")
                {{ $message }}
            @enderror
        </div>
        <button>Valider</button>
    </form>
@endsection
