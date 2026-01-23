@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

    @if(session('success'))
        {{ session('success') }}
    @elseif(session('error'))
        {{ session('error') }}
    @endif
    <button onclick="window.location='{{route('teacher.student_gestion', $schoolClass->id)}}'">Retour</button>
    <h1>{{$student_selected->first_name}} {{$student_selected->last_name}}</h1>
    <h2>Modifier les informations de l'élève</h2>
        <form method="POST" action="{{route('teacher.updateclass', $schoolClass)}}">
            @csrf
            <!-- Modif de classe -->
            <label for="SchoolClass_name">Nom de la classe :</label>
            <input name="SchoolClass_name" type="text" value="{{ $schoolClass->name }}">
            @error('SchoolClass_name')
                <p>{{ $message }}</p>
            @enderror
            <label for="SchoolClass_code">Code de la classe :</label>
            <input name="SchoolClass_code" type="text" value="{{ $schoolClass->class_code }}">
            @error('SchoolClass_code')
                <p>{{ $message }}</p>
            @enderror
            <button type="submit">Modifier</button>
        </form>
        <button onclick="window.location='{{route('teacher.deletestudent', [$schoolClass, $student_selected])}}'">Supprimer</button>
@endsection