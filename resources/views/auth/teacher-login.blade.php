@extends('layout')

@section('title', 'Connexion enseignant')

@section('content')
    <h1>Connexion enseignant</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('teacher.login.store') }}">
        @csrf

        <div>
            <label for="email">E-mail</label><br>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">Mot de passe</label><br>
            <input id="password" name="password" type="password" required>
        </div>

        <div>
            <label>
                <input type="checkbox" name="remember" value="1">
                Se souvenir de moi
            </label>
        </div>

        <button type="submit">Se connecter</button>
    </form>

    <hr>

    <p>Pas encore de compte ?</p>
    <p><a href="{{ route('teacher.register') }}">Créer un compte</a></p>
@endsection
