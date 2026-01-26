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
        <form method="POST" action="{{route('teacher.updatestudent', [$schoolClass, $student_selected])}}">
            @csrf
            <!-- Modif de classe -->
            <label for="first_name">Prénom de l'élève :</label>
            <input name="first_name" type="text" value="{{ $student_selected->first_name }}">
            @error('SchoolClass_name')
                <p>{{ $message }}</p>
            @enderror
            <label for="last_name">Nom de l'élève :</label>
            <input name="last_name" type="text" value="{{ $student_selected->last_name }}">
            @error('SchoolClass_code')
                <p>{{ $message }}</p>
            @enderror
            <button type="submit">Modifier</button>
        </form>
        <form method="POST" action="{{route('teacher.deletestudent', [$schoolClass, $student_selected])}}">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
@endsection
