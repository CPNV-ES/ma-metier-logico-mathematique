@extends('layout')

@section('title', '$name')

@section('content')
    <!-- Nom de la catégorie -->
    <h1>{{$name}}</h1>
    <button onclick="window.history.back()">Retour</button>
    <!-- Affiche tous les niveaux selon leur catégorie - a implémenter -->
     
        @foreach($types as $type)
            <div>
                <p>
                    {{ $type->name }}
                </p>
                <!-- Affiche tous les niveaux des types de jeux présents - a corriger -->
                @foreach($levels as $level)
                    <button>
                        {{$level->name}}
                    </button>
                @endforeach
            </div>
        @endforeach
        
@endsection
