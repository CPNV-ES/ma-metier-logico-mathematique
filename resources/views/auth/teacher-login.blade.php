@extends('layout')

@section('title', 'Connexion enseignant')

@section('content')
<div class="min-h-screen bg-[#FFF4B8] relative">
    <header>
        <button class="bg-[#DB5B00] m-3 p-3 text-white text-xl rounded-3xl w-40 transition hover:bg-red-800" onclick="window.location='{{route('home')}}'">← Retour</button>
    </header>
    <div class="flex flex-col items-center mt-20">

        <h1 class="text-6xl text-center">Connexion enseignant</h1>
        
        <div class="flex flex-col items-center justify-center bg-white border-gray-300 border-1 mt-10 p-5 pb-0 rounded-xl">

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            
            <form method="POST" action="{{ route('teacher.login.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="email">E-mail</label><br>
                    <input class="border-2 border-gray-200 ml-1 mt-1 rounded-md p-1 pl-2 pr-30 w-full" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus placeholder="exemple@gmail.com">
                </div>

                <div class="mb-3">
                    <label for="password">Mot de passe</label><br>
                    <input class="border-2 border-gray-200 ml-1 mt-1 rounded-md p-1 pl-2 pr-30 w-full" id="password" name="password" type="password" required placeholder="Password">
                </div>

                <div class="mb-3">
                    <label>
                        <input type="checkbox" name="remember" value="1">
                        Se souvenir de moi
                    </label>
                </div>

                <button class="bg-[#DB5B00] m-2 mr-1 p-2 text-white rounded-lg transition hover:bg-red-800 w-full" type="submit">Se connecter</button>
            </form>
            <div class="text-center">
                <p class="flex items-center justify-center text-center bg-white border-gray-300">Pas encore de compte ?</p>
                <p class="flex items-center justify-center text-center bg-white pb-4 border-gray-300"><a class="underline text-blue-400" href="{{ route('teacher.register') }}">Créer un compte</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
