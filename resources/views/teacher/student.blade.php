@extends('layout')

@section('title', auth('teacher')->user()->first_name)

@section('content')
<div>
    <header>
        <button class="bg-[#DB5B00] m-3 p-3 text-white text-xl rounded-3xl w-40 transition hover:bg-red-800" onclick="window.location='{{route('teacher.student_gestion', $schoolClass->id)}}'">Retour</button>
    </header>
    <h1 class="text-6xl text-center my-5">{{$student_selected->first_name}} {{$student_selected->last_name}}</h1>

    <div class="flex bg-[#FFF4B8] relative ml-40">

        @if(session('success'))
            {{ session('success') }}
        @elseif(session('error'))
            {{ session('error') }}
        @endif
        <div class="flex flex-col items-center mt-10">
            <h2 class="text-3xl text-center">Modifier les informations de l'élève</h2>

            <div class="flex flex-col items-center justify-center bg-white border-gray-300 border-1 mt-10 p-5 pb-0 rounded-xl">
                <form class="flex flex-col items-center" method="POST" action="{{route('teacher.updatestudent', [$schoolClass, $student_selected])}}">
                    @csrf
                    <!-- Modif de classe -->
                    <label for="first_name">Prénom de l'élève :</label>
                    <input class="border-2 border-gray-200 ml-1 mt-1 rounded-md p-1 pl-2 pr-30" name="first_name" type="text" value="{{ $student_selected->first_name }}">
                    @error('SchoolClass_name')
                        <p>{{ $message }}</p>
                    @enderror
                    <label for="last_name">Nom de l'élève :</label>
                    <input class="border-2 border-gray-200 ml-1 mt-1 rounded-md p-1 pl-2 pr-30" name="last_name" type="text" value="{{ $student_selected->last_name }}">
                    @error('SchoolClass_code')
                        <p>{{ $message }}</p>
                    @enderror
                    <button class="bg-[#DB5B00] m-4 mr-3 p-2 text-white rounded-lg w-78 transition hover:bg-red-800" type="submit">Modifier</button>
                </form>
                <form method="POST" action="{{route('teacher.deletestudent', [$schoolClass, $student_selected])}}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-[#DB5B00] m-4 mt-1 mr-3 p-2 text-white rounded-lg w-78 transition hover:bg-red-800" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
        <div class="flex flex-col items-center relative mt-10 ml-70">
            <h2 class="text-3xl text-center">Statistiques</h1>
            <div class="bg-white border-gray-300 border-1 mt-10 pb-5 rounded-lg">
                @if($levels->isNotEmpty())
                    <table class="w-220 h-20 flex-col overflow-hidden rounded-lg bg-white relative items-center">
                        <tr class="border-b-1 h-10">
                            <th>Catégorie</th>
                            <th>Type de jeu</th>
                            <th>Niveau</th>
                            <th>Essais</th>
                            <th>% de réussite</th>
                            <th>Statut</th>
                        </tr>
                        @foreach($levels as $level)
                        <tr class="h-8">
                            <td class="w-0 px-4">{{ $level->exercice?->Level?->GameType?->GameCategory->name }}</td>
                            <td class="w-64 px-10">{{ $level->exercice?->Level?->GameType->name }}</td>
                            <td class="w-24 px-4">{{ $level->exercice?->Level->name }}</td>
                            <td class="w-20 px-10">{{ $level->attempt }}</td>
                            <td class="w-31 px-10">{{ round((1/$level->attempt)*100, 2) }} %</td>
                            @if($level->completed == 0)
                                <td class="w-4 px-7">En cours</td>
                            @else
                                <td class="px-7">Terminé</td>
                            @endif
                        </tr>
                    @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
