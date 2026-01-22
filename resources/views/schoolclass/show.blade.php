@extends('layout')

@section('title', $className)

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
    @theme {
            --color-retour: #DB5B00;
            --color-retour_hover: #B74D01;
            --color-border: #040404;
            }
    body {background-color :#FFF4B8;
          min-width:screen}
    </style>
    <!-- Nom de la classe -->
    <button onclick="window.history.back()" class="m-3 px-7 py-2 bg-retour text-white rounded-xl w-35 hover:bg-retour_hover">Retour</button>
    <h1 class="text-center text-5xl min-w-screen mb-8">{{ $className }}</h1>
    <!-- Affiche tous les élèves -->
    <div class="flex flex-wrap justify-center min-w-screen w-full">
        @foreach($students as $student)
            <div class="flex content-center justify-center bg-white border border-border rounded-md w-40 h-40 hover:bg-stone-200 mx-8 my-4 align-text-bottom">
                <button onclick="window.location='{{ route('findstudent',['id'=>$student->id])}}'">
                    <img src="{{ $student->media->path }}" alt="" class="w-30">

                    <p>{{ $student->first_name }} {{ $student->last_name }}</p>
                </button>
            </div>
        @endforeach
    </div>
@endsection
