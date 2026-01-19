@extends('layout')

@section('title', 'Classe NAME')

@section('content')
    <!-- Nom de la classe -->
    <h1>{{ $className }}</h1>
    <button onclick="window.history.back()">Retour</button>
    <!-- Affiche tous les élèves -->
    @foreach($students as $student)
        <div>
            <a href="#">
                <!-- A tester avec les images <img src="{{ $student->medium_id }}" alt="animal"> -->
                <p>{{ $student->first_name }} {{ $student->last_name }}</p>
            </a>
        </div>
    @endforeach
@endsection
