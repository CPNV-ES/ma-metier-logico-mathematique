@extends('layout')

@section('title', 'Classe NAME')

@section('content')

    <h2>Liste des élèves</h2>
    <button onclick="window.history.back()">Retour</button>
    <!-- Affiche tous les élèves -->
    @foreach($students as $student)
        <div>
            <a href="#">
                <p>{{ $student->first_name }} {{ $student->last_name }}</p>
                <!-- A tester avec les images <img src="{{ $student->medium_id }}" alt="animal"> -->
            </a>
        </div>
    @endforeach
@endsection
