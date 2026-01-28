@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
    @theme {
            --color-retour: #DB5B00;
            --color-retour_hover: #B74D01;
            --color-filtre_hover: #a5a5a5ff;
            --color-ajouter: #8EED72;
            --color-ajouter_hover: #2DC300;
            --color-filtre: #52BDFF;
            --color-filtre_hover: #0093EE;
            --color-notification: #db5b005d;
            --color-classe_hover: #ffe553ff;
            }
    body {background-color :#FFF4B8;}
    </style>

    <button onclick="window.location='{{route('teacher.dashboard')}}'"class="bg-retour hover:bg-retour_hover active:bg-retour_hover text-white rounded-2xl w-35 m-3 px-7 py-2">&#8592 Retour</button>
    <h1 class="text-center text-5xl">Gestion des classes</h1>
    <p class="my-5 text-center text-xl">Cliquez sur une classe pour voir les élèves et pouvoir modifier ses informations ou la supprimer.</p>
    <section class="flex flex-wrap flex-row-reverse justify-center">
        <div class="ml-20">
            <h2 class="text-3xl text-center my-3">Ajouter une classe</h2>
            <form method="POST" action="{{route('teacher.newclass')}}">
                @csrf
                <!-- Ajout de classe -->
                <article class="flex flex-wrap mx-5">
                    <label for="SchoolClass_name" class="mr-1">Nom de la classe : </label>
                    <input name="SchoolClass_name" type="text" class="bg-white rounded-md" value="{{ old('SchoolClass_name') }}">
                    @error('SchoolClass_name')
                        <p>{{ $message }}</p>
                    @enderror
                </article>
                <br>
                <article class="flex flex-wrap mx-5">
                    <label for="SchoolClass_code" class="mr-1">Code de la classe : </label>
                    <input name="SchoolClass_code" type="text" class="bg-white rounded-md">
                    @error('SchoolClass_code')
                        <p>{{ $message }}</p>
                    @enderror
                </article>
                <br>
                <button type="submit" class="ml-5 bg-ajouter hover:bg-ajouter_hover hover:text-white active:bg-ajouter_hover active:text-white py-2 px-3 rounded-sm">+ Ajouter</button>
            </form>
            <article class="text-center text-black mt-2 bg-notification rounded-md">
                @if(session('success'))
                    {{ session('success') }}
                @endif
            </article>
        </div>
        <!-- Affiche les classes -->
        <div class="mr-20">
            <h2 class="text-3xl text-center my-3" >Liste des classes</h2>
            <form method="POST" action="{{route('teacher.schoolclass_gestion_filtrer')}}">
                @csrf
                    <!-- Filtre -->
                    <label for="schoolClasses" class="ml-5">Filtrer par :</label>
                    <select name="schoolClasses" id="schoolClasses" class="bg-white rounded-md py-1">
                    <!-- Conserve le filtre utilisé en dernier -->
                        <option value="all" {{ old($filter) == 'all' ? 'selected' : '' }} class="hover:bg-filtre_hover active:bg-filtre_hover">Toutes les classes</option>
                        <option value="Personnal" {{ ($filter) == 'Personnal' ? 'selected' : '' }}>Mes classes</option>
                    </select>
                    <button type="submit" class="ml-5 bg-filtre hover:bg-filtre_hover hover:text-white active:bg-filtre_hover active:text-white py-1 px-5 rounded-sm">Filtrer</button>
            </form>
            <table class="flex flex-wrap ml-8 max-w-80 my-3">
                    @foreach($schoolClasses as $schoolClass)
                        <tr class="border hover:bg-classe_hover active:bg-classe_hover">
                            <td class="border min-w-40 min-h-20 px-5 py-1"><a href="{{ route('teacher.student_gestion',['id'=>$schoolClass->id])}}">{{$schoolClass->name}}</a></td>
                            <td class="min-w-20 text-center py-1"><a href="{{ route('teacher.student_gestion',['id'=>$schoolClass->id])}}">{{$schoolClass->class_code}}</a></td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </section>
@endsection