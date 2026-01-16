@extends('base')

@section('title', 'Créer un compte')

@section('content')
    <form action="" method="post">
        @csrf
        <fieldset>
            <legend>Créer un compte</legend>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" size="40" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="">
            <label for="pswrd">Mot de passe :</label>
            <input type="password" id="pswrd" name="pswrd" required="">
            <label for="pswrd">Confirmer le mot de passe :</label>
            <input type="password" id="pswrd" name="pswrd" required="">
        </fieldset>
        <button>Créer un compte</button>
    </form>
@endsection