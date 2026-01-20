@extends('layout')

@section('title', '$name')

@section('content')
    <!-- Nom de la catégorie -->
    <h1>{{$name}}</h1>
    <button onclick="window.history.back()">Retour</button>
    <!-- Affiche toutes les niveaux - a implémenter -->
     
    {{--
        @foreach($levels as $level)
            <div>
                <button>
                    {{ $level->name }}
                </button>
            </div>
        @endforeach
        --}}
        
@endsection
