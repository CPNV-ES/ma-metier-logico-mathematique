@extends('layout')

@section('title', $name)

@php
    $colors = [
        'bg-[#52BDFF] hover:bg-cyan-700 hover:text-white',
        'bg-[#4EDB02] hover:bg-green-700 hover:text-white',
        'bg-[#ED69C5] hover:bg-pink-700 hover:text-white',
    ];
@endphp

@section('content')
    <!-- Nom de l'élève -->
    <button class="bg-[#DB5B00] m-3 p-3 text-white text-xl rounded-3xl w-40 transition hover:bg-red-800" onclick="window.history.back()">← Retour</button>
    <h1 class="text-7xl text-center my-8">{{$name}}</h1>
    <!-- Affiche toutes les catégories -->

    @foreach($categories as $index => $category)
        <div class="flex items-center justify-center">
            <button class="flex {{ $colors[$index % count($colors)] }} my-8 w-400 text-6xl text-center items-center justify-center pr-130 rounded-2xl transition" onclick="window.location='{{route('findcategory',['id'=>$category->id])}}'">
                <img class="w-80 h-40 mr-50" src="{{ $category->media->path }}" alt="">
                {{ $category->name }}
            </button>
        </div>
    @endforeach

@endsection
