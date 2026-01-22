@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

<button onclick="window.location='{{route('teacher.dashboard')}}'">Retour</button>
<h1>Gestion des classes</h1>
<form method="POST" action="{{route('teacher.schoolclass_gestion_filtrer')}}">
    @csrf
    <label for="schoolClasses">Filtrer par :</label>
    <select name="schoolClasses" id="schoolClasses">
    <!-- Conserve le filtre utilisé en dernier -->
        <option value="all" {{ old($filter) == 'all' ? 'selected' : '' }}>Toutes les classes</option>
        <option value="Personnal" {{ ($filter) == 'Personnal' ? 'selected' : '' }}>Mes classes</option>
    </select>
    <button type="submit">Filtrer</button>
</form>
<ul>
    @foreach($schoolClasses as $schoolClass)
        <li>{{$schoolClass->name}} {{$schoolClass->class_code}}</li>
    @endforeach
</ul>
@endsection