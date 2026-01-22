@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

<form method="POST" action="{{ route('teacher.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

<h1>Espace enseignant(e)</h1>

<p>
    Connecté en tant que :
    {{ auth('teacher')->user()->first_name }}
    {{ auth('teacher')->user()->last_name }}
    ({{ auth('teacher')->user()->email }})
    {{-- A revoir selon le nom donné au champ
    @if ( auth('teacher')->user()->isAdmin == True)
        Role : Admin
    @else
        Role : Enseignant(e)
    @endif
    --}}
</p>

<!-- Boutons pour choisir quoi faire -->
<button>Gestions des classes et des élèves</button>
<button>Statistiques des élèves</button>
<button>Gestions des exercices</button>
{{-- A revoir selon le nom donné au champ
    @if ( auth('teacher')->user()->isAdmin == True)
        <button>Gestion des comptes enseignants</button>
    @endif
    --}}
@endsection