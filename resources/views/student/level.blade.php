@extends('layout')

@section('title', $name)

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
    @theme {
            --color-retour: #DB5B00;
            --color-retour_hover: #B74D01;
            }
    body {background-color :#FFF4B8;}
    </style>
    <!-- Nom de la catégorie -->
    <button onclick="window.history.back()" class="bg-retour hover:bg-retour_hover active:bg-retour_hover text-white rounded-2xl w-35 m-3 px-7 py-2">&#8592 Retour</button>
    <h1 class="text-5xl text-center">{{$name}}</h1>

        @foreach($types as $type)
            <div>
                <p class="text-4xl ml-5 mt-10 mb-5">
                    {{ $type->name }}
                </p>
                <!-- Affiche tous les niveaux selon leur catégorie -->
                <div class="flex flex-wrap ml-6">
                    @foreach($levels->where('game_type_id', $type->id) as $level)
                        <button class="border text-center rounded-2xl min-w-6 px-2 py-2 min-h-12 m-1 hover:bg-retour hover:text-white hover:border-retour active:bg-retour active:text-white active:border-retour">
                            {{$level->name}}
                        </button>
                    @endforeach
                </div>
            </div>
        @endforeach

@endsection
