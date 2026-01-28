@extends('layout')

@section('title', 'Créer un compte teacher')

@section('content')
<div class="min-h-screen bg-[#FFF4B8] relative">
    <header>
        <button class="bg-[#DB5B00] m-3 p-3 text-white text-xl rounded-3xl w-40 transition hover:bg-red-800" onclick="window.location='{{route('home')}}'">← Retour</button>
    </header>
    <div class="flex flex-col items-center mt-20">

        <h1 class="text-6xl text-center">Créer un compte</h1>

        <div class="flex flex-col items-center justify-center bg-white border-gray-300 border-1 mt-10 p-5 pb-0 rounded-xl">

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('teacher.register.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="first_name">Prénom</label><br>
                    <input class="border-2 border-gray-200 ml-1 mt-1 rounded-md p-1 pl-2 pr-30" id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" required placeholder="Firstname">
                </div>

                <div class="mb-3">
                    <label for="last_name">Nom</label><br>
                    <input class="border-2 border-gray-200 ml-1 mt-1 rounded-md p-1 pl-2 pr-30" id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" required placeholder="Lastname">
                </div>

                <div class="mb-3">
                    <label for="email"> Adresse mail</label><br>
                    <input class="border-2 border-gray-200 ml-1 mt-1 rounded-md p-1 pl-2 pr-30" id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="exemple@gmail.com">
                </div>

                <div class="mb-3">
                    <label for="password">Mot de passe</label><br>
                    <input class="border-2 border-gray-200 ml-1 mt-1 rounded-md p-1 pl-2 pr-30" id="password" name="password" type="password" required placeholder="Password">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation">Confirmer le mot de passe</label><br>
                    <input class="border-2 border-gray-200 ml-1 mt-1 rounded-md p-1 pl-2 pr-30" id="password_confirmation" name="password_confirmation" type="password" required placeholder="Password">
                </div>

                <button class="bg-[#DB5B00] m-2 mr-1 p-2 text-white rounded-lg w-78 transition hover:bg-red-800" type="submit">Créer</button>
            </form>
            <div class="text-center">
                <p class="flex items-center justify-center bg-white border-gray-300">Déjà un compte ?</p>
                <p class="flex items-center justify-center text-center bg-white pb-4 border-gray-300"><a class="underline text-blue-400" href="{{ route('teacher.login') }}">Se connecter</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
