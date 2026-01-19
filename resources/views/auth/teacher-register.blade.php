<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher register</title>
</head>
<body>
<h1>Créer un compte teacher</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('teacher.register.store') }}">
    @csrf

    <div>
        <label for="first_name">First name</label><br>
        <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" required>
    </div>

    <div>
        <label for="last_name">Last name</label><br>
        <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" required>
    </div>

    <div>
        <label for="email">Email</label><br>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label for="password">Password</label><br>
        <input id="password" name="password" type="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirm password</label><br>
        <input id="password_confirmation" name="password_confirmation" type="password" required>
    </div>

    <button type="submit">Create account</button>
</form>

<p>
    Déjà un compte ?
    <a href="{{ route('teacher.login') }}">Se connecter</a>
</p>
</body>
</html>
