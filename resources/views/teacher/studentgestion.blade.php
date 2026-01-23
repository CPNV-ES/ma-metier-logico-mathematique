@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

    @if(session('success'))
        {{ session('success') }}
    @elseif(session('error'))
        {{ session('error') }}
    @endif
    <button onclick="window.location='{{route('teacher.schoolclass_gestion')}}'">Retour</button>
    <h1>Gestion des élèves de la classe {{$schoolClass->name}}</h1>
    <p>Cliquez sur un élève pour pouvoir modifier ses informations ou le supprimer.</p>
    <h2>Modifier les informations de la classe</h2>
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
        <button onclick="window.location='{{route('teacher.deleteclass', $schoolClass)}}'">Supprimer</button>
    <h2>Ajouter des élèves</h2>
    <!-- Ajout de l'élève -->
    <form method="POST" action="{{route('teacher.newstudent', $schoolClass)}}">
        @csrf
        <label for="first_name">Prénom de l'élève :</label>
        <input name="first_name" type="text" value="{{ old('first_name') }}">
        @error('first_name')
            <p>{{ $message }}</p>
        @enderror
        <label for="last_name">Nom de l'élève :</label>
        <input name="last_name" type="text" value="{{ old('last_name') }}">
        @error('last_name')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Ajouter</button>
    </form>
    <h2>Liste des élèves</h2>
    <!-- Affiche les élèves (à modifier) -->
    <ul>
        @foreach($students as $student)
            <li><a href="{{ route('teacher.student', ['schoolClass'=>$schoolClass, 'student'=>$student])}}">{{$student->first_name}} {{$student->last_name}}</a></li> {{--{{ route('teacher.showstudent',$schoolClass, $student)}}--}}
        @endforeach
    </ul>
@endsection