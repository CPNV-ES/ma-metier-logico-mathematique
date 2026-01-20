@extends('layout')

@section('title', 'student name') <!-- 'student name' à remplacer par qqch du genre $studentName quand on pourra return ça depuis la base -->

@section('content')
    <!-- Nom de l'élève -->
    <h1>student name</h1>
    <button onclick="window.history.back()">Retour</button>
    <!-- Affiche toutes les catégories -->
    <!-- A implémenter plus tard -->
     {{--
    @foreach($categories as $category)
        <div>
            <a href="#">
                {{ $category->name }}
            </a>
        </div>
    @endforeach
        --}}
@endsection
