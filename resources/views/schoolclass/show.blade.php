@extends('layout')

@section('title', $className)

@section('content')
    <!-- Nom de la classe -->
    <h1>{{ $className }}</h1>
    <button onclick="window.history.back()">Retour</button>
    <!-- Affiche tous les élèves -->
    @foreach($students as $student)
        <div>
            <button onclick="window.location='{{ route('findstudent',['id'=>$student->id])}}'">
                <img src="{{ $student->media->path }}" alt="">

                <p>{{ $student->first_name }} {{ $student->last_name }}</p>
            </button>
        </div>
    @endforeach
@endsection
