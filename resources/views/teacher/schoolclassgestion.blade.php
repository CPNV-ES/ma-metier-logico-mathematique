@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

<button onclick="window.history.back()">Retour</button>
<h1>Gestion des classes</h1>
<ul>
    @foreach($schoolClasses as $schoolClass)
        <li>{{$schoolClass->name}} {{$schoolClass->class_code}}</li>
    @endforeach
</ul>
@endsection