@extends('base')

@section('title', 'Login')

@section('content')
    <form action="" method="post">
        @csrf
        <fieldset>
            <legend>Se Connecter</legend>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" size="40" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="">
            <label for="pswrd">Mot de passe :</label>
            <input type="password" id="pswrd" name="pswrd" required="">
            <a href="#">Mot de passe oublié ?</a>
        </fieldset>
        <button>Se Connecter</button>
    </form>
@endsection