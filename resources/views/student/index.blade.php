@extends('layout')

@section('title', $name)

@section('content')
    <!-- Nom de l'élève -->
    <h1>{{$name}}</h1>
    <button onclick="window.history.back()">Retour</button>
    <!-- Affiche toutes les catégories -->

    @foreach($categories as $category)
        <div>
            <button onclick="window.location='{{route('findcategory',['id'=>$category->id])}}'">
                <img src="{{ $category->media->path }}" alt="">
                {{ $category->name }}
            </button>
        </div>
    @endforeach

@endsection
