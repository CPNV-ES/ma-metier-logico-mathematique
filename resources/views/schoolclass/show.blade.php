@extends('layout')

@section('title', 'Classe NAME')

@section('content')

    <h2>Liste des élèves</h2>
    @foreach($students as $student)
        <div>
            <p>{{ $student->first_name }}</p>
        </div>
    @endforeach
@endsection
