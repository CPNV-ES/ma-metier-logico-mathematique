@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
    @theme {
            --color-retour: #DB5B00;
            --color-retour_hover: #B74D01;
            --color-ajouter: #8EED72;
            --color-ajouter_hover: #2DC300;
            --color-supprimer: #EA0000;
            --color-supprimer_hover: #c70000ff;
            --color-modifier: #DBB000;
            --color-modifier_hover: #b38f00ff;
            --color-eleves_hover: #ffaf1bff;
            --color-eleves: #ffd257ff;
            --color-border: #70350eff;
            }
    body {background-color :#FFF4B8;}
    </style>

    <button onclick="window.location='{{route('teacher.schoolclass_gestion')}}'"class="bg-retour hover:bg-retour_hover active:bg-retour_hover text-white rounded-2xl w-35 m-3 px-7 py-2">&#8592 Retour</button>
    <h1 class="text-4xl text-center">Gestion des élèves de la classe {{$schoolClass->name}}</h1>
    <p class="my-5 text-xl text-center">Cliquez sur un élève pour pouvoir modifier ses informations, voir ses statistiques ou le supprimer.</p>

    @if(session('success'))
        <div class="text-center rounded-md mx-30 bg-ajouter">
            {{ session('success') }}
        </div>

    @elseif(session('error'))
        <div class="text-center bg-supprimer mx-30 rounded-md">
            {{ session('error') }}
        </div>
    @endif
    <div class="flex flex-wrap justify-center">
        <section class="mx-20 text-center">
            <h2 class="my-4 text-2xl">Modifier les informations de la classe</h2>

                <form method="POST" action="{{route('teacher.updateclass', $schoolClass)}}">
                    @csrf
                    <!-- Modif de classe -->
                    <div class="my-2">
                        <label for="SchoolClass_name">Nom de la classe :</label>
                        <input name="SchoolClass_name" type="text" value="{{ $schoolClass->name }}" class="bg-white rounded-md">
                    </div>
                    @error('SchoolClass_name')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="my-2">
                        <label for="SchoolClass_code">Code de la classe :</label>
                        <input name="SchoolClass_code" type="text" value="{{ $schoolClass->class_code }}" class="bg-white rounded-md">
                    </div>
                    @error('SchoolClass_code')
                        <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="my-3 w-[300px] p-1 rounded-md bg-modifier hover:bg-modifier_hover hover:text-white active:bg-modifier_hover active:text-white">Modifier</button>
                </form>

                <form method="POST" action="{{route('teacher.deleteclass', $schoolClass)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-1 w-[300px] rounded-md bg-supprimer hover:bg-supprimer_hover hover:text-white active:bg-supprimer_hover active:text-white">Supprimer</button>
                </form>
        </section>
        <section class="mx-20 text-center flex flex-col justify-center">
            <h2 class="my-4 text-2xl">Ajouter des élèves</h2>
            <!-- Ajout de l'élève -->
            <form method="POST" action="{{route('teacher.newstudent', $schoolClass)}}">
                @csrf
                <div class="my-2">
                    <label for="first_name">Prénom de l'élève :</label>
                    <input name="first_name" type="text" value="{{ old('first_name') }}" class="bg-white rounded-md">
                </div>
                @error('first_name')
                    <p>{{ $message }}</p>
                @enderror
                <div class="my-2">
                    <label for="last_name">Nom de l'élève :</label>
                    <input name="last_name" type="text" value="{{ old('last_name') }}" class="bg-white rounded-md">
                </div>
                @error('last_name')
                    <p>{{ $message }}</p>
                @enderror
                <button type="submit" class=" bg-ajouter w-[300px] hover:bg-ajouter_hover hover:text-white active:bg-ajouter_hover active:text-white py-2 px-3 rounded-sm">+ Ajouter</button>
            </form>
            <h2 class="my-4 text-2xl">Liste des élèves</h2>
            <!-- Affiche les élèves (à modifier) -->
            <table class="flex flex-wrap max-w-80 my-3">
                @foreach($students as $student)
                    <tr class="bg-eleves border border-border hover:bg-eleves_hover active:bg-eleves_hover">
                        <td class="border border-border min-w-40 min-h-20 px-5 py-1"><a href="{{ route('teacher.student', ['schoolClass'=>$schoolClass, 'student'=>$student])}}">{{$student->first_name}}</a></td>
                        <td class="border border-border min-w-40 min-h-20 px-5 py-1"><a href="{{ route('teacher.student', ['schoolClass'=>$schoolClass, 'student'=>$student])}}">{{$student->last_name}}</a></td>
                    </tr>
                @endforeach
            </table>
        </section>
    </div>
@endsection
