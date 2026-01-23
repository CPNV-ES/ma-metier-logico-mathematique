@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

    <button onclick="window.location='{{route('teacher.schoolclass_gestion')}}'">Retour</button>
    <h1>Gestion des élèves</h1>
    <form method="POST" action="{{route('teacher.newclass')}}">
        @csrf
        <!-- Ajout de l'élève (à modifier) -->
        <label for="SchoolClass_name">Nom de l'élève :</label>
        <input name="SchoolClass_name" type="text" value="{{ old('SchoolClass_name') }}">
        @error('SchoolClass_name')
            <p>{{ $message }}</p>
        @enderror
        <label for="SchoolClass_code">Prénom de l'élève :</label>
        <input name="SchoolClass_code" type="text">
        @error('SchoolClass_code')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Ajouter</button>
    </form>
    @if(session('success'))
        {{ session('success') }}
    @endif
    <!-- Affiche les élèves (à modifier) -->
    <ul>
        @foreach($students as $student)
            <li><a href="#">{{$student->first_name}} {{$student->last_name}}</a></li> {{--{{ route('showstudents',['id'=>$student->id])}}--}}
        @endforeach
    </ul>
@endsection