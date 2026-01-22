@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

<button onclick="window.history.back()">Retour</button><!-- Modifier car si on filtre plusieurs fois ça fout la merde -->
<h1>Gestion des classes</h1>
<form method="POST" action="{{route('teacher.schoolclass_gestion_filtrer')}}">
    @csrf
    <label for="schoolClasses">Filtrer par :</label>
    <select name="schoolClasses" id="schoolClasses">
        <option value="all">Toutes les classes</option>
        <option value="Personnal">Mes classes</option>
    </select>
    <button type="submit">Filtrer</button>
</form>
<ul>
    @foreach($schoolClasses as $schoolClass)
        <li>{{$schoolClass->name}} {{$schoolClass->class_code}}</li>
    @endforeach
</ul>
@endsection