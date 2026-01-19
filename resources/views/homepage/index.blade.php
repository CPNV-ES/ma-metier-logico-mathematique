@extends('layout')

@section('title', 'Accueil Jeux Logico-mathématiques')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style type="text/tailwindcss">
        @theme {
            --color-header: #DF9F5F;
            --color-background: #FFF4B8;
            --color-input: #FFFBE4;
        }
    </style>

    <div class="bg-background min-h-screen min-w-screen w-full">
        <header class="bg-header font-semibold">
            <div class="mx-auto w-full max-w-6xl px-4 py-3">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h1 class="text-center text-base sm:text-lg lg:text-xl">
                        Enseignant-e ? Connectez-vous ou créez un compte !
                    </h1>

                    <div class="flex flex-col gap-2 sm:flex-row sm:gap-3 sm:justify-end">
                        <a
                            href="{{ route('teacher.register') }}"
                            class="inline-flex items-center justify-center rounded-full bg-white px-5 py-2 text-base sm:text-lg hover:bg-gray-200 transition-colors"
                        >
                            Créer
                        </a>

                        <a
                            href="{{ route('teacher.login') }}"
                            class="inline-flex items-center justify-center rounded-full bg-black px-5 py-2 text-base sm:text-lg text-white hover:bg-gray-700 transition-colors"
                        >
                            Se Connecter
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <main class="mx-auto w-full max-w-4xl px-4 pb-12 pt-10 sm:pt-14">
            <h1 class="font-[Arial] font-semibold text-3xl sm:text-4xl lg:text-5xl text-center text-black">
                Jeux Logico-mathématiques
            </h1>

            <form action="" method="post" class="mt-10 sm:mt-14">
                @csrf

                <div class="flex flex-col items-center justify-center gap-4">
                    <input
                        class="bg-input w-full max-w-sm sm:max-w-md lg:max-w-lg rounded-2xl border-2 border-black/50 px-4 py-4 sm:py-6 text-xl sm:text-2xl focus:outline-none focus:ring-2 focus:ring-black/30"
                        type="text"
                        name="class_code"
                        placeholder="Code"
                        value="{{ old('class_code') }}"
                    >

                    @error('class_code')
                    <p class="text-red-600 font-semibold text-sm sm:text-base">
                        {{ $message }}
                    </p>
                    @enderror

                    <button
                        class="w-full max-w-[10rem] sm:max-w-[12rem] rounded-md bg-orange-400 px-6 py-3 sm:py-4 text-2xl sm:text-3xl hover:bg-orange-600 transition-colors"
                        type="submit"
                    >
                        Ok
                    </button>
                </div>
            </form>
        </main>
    </div>
@endsection
