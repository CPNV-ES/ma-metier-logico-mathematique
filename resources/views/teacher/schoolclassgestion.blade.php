@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

<button onclick="window.history.back()">Retour</button>
<h1>Gestion des classes</h1>

@endsection