{{-- resources/views/teacher/dashboard.blade.php --}}
    <!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher dashboard</title>
</head>
<body>
<li><a href="{{ route('teacher.dashboard') }}"><h1>Dashboard</h1></a>

<p>
    Connecté en tant que :
    {{ auth('teacher')->user()->first_name }}
    {{ auth('teacher')->user()->last_name }}
    ({{ auth('teacher')->user()->email }})
</p>

<nav>
    <ul>
        <li><a href="{{ route('homepage.index') }}">Page d'accueil</a></li>
    </ul>
</nav>

<h2>Mes classes (aperçu)</h2>

@php
    $classes = auth('teacher')->user()->schoolClasses()->latest()->take(10)->get();
@endphp

@if ($classes->isEmpty())
    <p>Aucune classe pour le moment.</p>
@else
    <table border="1" cellpadding="6">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Code</th>
            <th>Créée le</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($classes as $class)
            <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->name }}</td>
                <td>{{ $class->class_code }}</td>
                <td>{{ $class->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--<p><a href="{{ route('school-classes.index') }}">Voir toutes mes classes</a></p>--}}
@endif

<form method="POST" action="{{ route('teacher.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
</body>
</html>
