@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --color-retour: #DB5B00;
            --color-retour_hover: #B74D01;
            --color-classe_eleve: #8EED72;
            --color-stats: #52BDFF;
            --color-exercices: #FF6232;
            --color-classe_eleve_hover: #2DC300;
            --color-stats_hover: #0093EE;
            --color-exercices_hover: #EA3700;
            --color-enseignant: #E838FF;
            --color-enseignant_hover: #BC0ED3;
        }
        body {background-color:#FFF4B8}
    </style>

    <form method="POST" action="{{ route('teacher.logout') }}">
        @csrf
        <button type="submit" class="m-3 px-7 py-2 bg-retour text-white rounded-2xl w-35 hover:bg-retour_hover w-auto">&#8592 Déconnexion</button>
    </form>

    <h1 class="text-5xl text-center m-5">Espace maîtres(ses)</h1>

    <p class="text-lg text-center">
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
        <button class="bg-classe_eleve mx-20 my-10 text-[40px] h-26 w-full text-center rounded-xl hover:bg-classe_eleve_hover" onclick="window.location='{{route('teacher.schoolclass_gestion')}}'">Gestions des classes et des élèves</button>
        <button class="bg-stats mx-20 my-10 text-[40px] h-26 text-center w-full rounded-xl hover:bg-stats_hover">Statistiques des élèves</button>
        <button class="bg-exercices mx-20 my-10 text-[40px] h-26 text-center w-full rounded-xl hover:bg-exercices_hover">Gestions des exercices</button>
        {{-- A revoir selon le nom donné au champ
            @if ( auth('teacher')->user()->isAdmin == True)
                <button class="bg-enseignant mx-20 my-10 text-[40px] h-26 w-full text-center rounded-xl hover:bg-enseignant_hover">Gestion des comptes enseignants</button>
            @endif
            --}}
    </div>
@endsection
