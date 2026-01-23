@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

    <button onclick="window.location='{{route('teacher.dashboard')}}'">Retour</button>
    <h1>Gestion des classes</h1>
    <form method="POST" action="{{route('teacher.schoolclass_gestion_filtrer')}}">
        @csrf
            <!-- Filtre -->
            <label for="schoolClasses">Filtrer par :</label>
            <select name="schoolClasses" id="schoolClasses">
            <!-- Conserve le filtre utilisé en dernier -->
                <option value="all" {{ old($filter) == 'all' ? 'selected' : '' }}>Toutes les classes</option>
                <option value="Personnal" {{ ($filter) == 'Personnal' ? 'selected' : '' }}>Mes classes</option>
            </select>
            <button type="submit">Filtrer</button>
    </form>
    <form method="POST" action="{{route('teacher.newclass')}}">
        @csrf
        <!-- Ajout de classe -->
        <label for="SchoolClass_name">Nom de la classe :</label>
        <input name="SchoolClass_name" type="text" value="{{ old('SchoolClass_name') }}">
        @error('SchoolClass_name')
            <p>{{ $message }}</p>
        @enderror
        <label for="SchoolClass_code">Code de la classe :</label>
        <input name="SchoolClass_code" type="text">
        @error('SchoolClass_code')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Ajouter</button>
    </form>
    @if(session('success'))
        {{ session('success') }}
    @endif
    <!-- Affiche les classes -->
    <ul>
        @foreach($schoolClasses as $schoolClass)
            <li><a href="#">{{$schoolClass->name}} {{$schoolClass->class_code}}</a><button>Modifier</button><button>Supprimer</button></li>
        @endforeach
    </ul>
@endsection