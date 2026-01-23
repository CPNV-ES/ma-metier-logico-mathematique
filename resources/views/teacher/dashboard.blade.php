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
    <div class="flex flex-wrap justify-center min-w-screen w-full">
        <button class="bg-classe_eleve mx-20 my-10 text-[40px] h-26 w-full text-center rounded-xl hover:bg-classe_eleve_hover">Gestions des classes et des élèves</button>
        <button class="bg-stats mx-20 my-10 text-[40px] h-26 text-center w-full rounded-xl hover:bg-stats_hover">Statistiques des élèves</button>
        <button class="bg-exercices mx-20 my-10 text-[40px] h-26 text-center w-full rounded-xl hover:bg-exercices_hover">Gestions des exercices</button>
        <a href="{{ route('teacher.exercises.create') }}">Gestions des classes et des élèves</a>

        {{-- A revoir selon le nom donné au champ
            @if ( auth('teacher')->user()->isAdmin == True)
                <button class="bg-enseignant mx-20 my-10 text-[40px] h-26 w-full text-center rounded-xl hover:bg-enseignant_hover">Gestion des comptes enseignants</button>
            @endif
            --}}
    </div>
@endsection
