@extends('layout')

@section('title', $name)

@section('content')
    <!-- Nom de l'élève -->
    <h1>{{$name}}</h1>
    <button onclick="window.history.back()">Retour</button>
    <!-- Affiche toutes les catégories - A implémenter plus tard -->
     {{--
    @foreach($categories as $category)
        <div>
            <button>
                {{ $category->name }}
            </button>
        </div>
    @endforeach
        --}}
@endsection
