@extends('layout')

@section('title', $name)

@section('content')
    <!-- Nom de la catégorie -->
    <h1>{{$name}}</h1>
    <button onclick="window.history.back()">Retour</button>
     
        @foreach($types as $type)
            <div>
                <p>
                    {{ $type->name }}
                </p>
                <!-- Affiche tous les niveaux selon leur catégorie -->
                @foreach($levels->where('game_type_id', $type->id) as $level)
                    <button>
                        {{$level->name}}
                    </button>
                @endforeach
            </div>
        @endforeach
        
@endsection
