@extends('layout')

@section('title', "Création d'exercice")

@section('content')
    <!-- Nom de l'élève -->
    <h1>Création d'exercice</h1>
    <button onclick="window.history.back()">Retour</button>
    <!-- Affiche toutes les catégories -->

    @if ($errors->any())
        <div class="mb-6 rounded-lg border p-4">
            <p class="font-semibold mb-2">Erreurs de validation</p>
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teacher.exercises.store') }}" method="post">
        @csrf

        <select id="game_category" name="game_category" class="">
            @foreach($gameCategories as $gameCategory)
                <option value="{{ $gameCategory->id }}">{{$gameCategory->name}}</option>
            @endforeach
        </select>

        <select id="game_type" name="game_type" class="">
            @foreach($gameTypes as $gameType)
                <option value="{{ $gameType->id }}">{{$gameType->name}}</option>
            @endforeach
        </select>

        <select id="level" name="level" class="">
            @foreach($levels as $level)
                <option value="{{ $level->id }}">{{$level->name}}</option>
            @endforeach
        </select>

        <select id="type" name="type" class="">
            <option value="single_select">Solution unique</option>
            <option value="multi_select">Solution multiple</option>
            <option value="ordering">Solution par ordre</option>
        </select>

        <select
            class="js-media-select w-full border rounded-lg p-2"
            name="media_id"
        >
            <option value="">— Aucune image —</option>
            @foreach ($media as $m)
                <option
                    value="{{ $m->id }}"
                    data-url="{{ asset(ltrim($m->name, '/')) }}"
                >
                    {{ $m->path }}
                </option>
            @endforeach
        </select>





    </form>


@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
    document.querySelectorAll('.js-media-select').forEach((el) => {
        const previewSelector = el.dataset.preview;
        const preview = previewSelector ? document.querySelector(previewSelector) : null;

        const ts = new TomSelect(el, {
            create: false,
            allowEmptyOption: true,
            placeholder: 'Rechercher une image…',
            onChange(value) {
                if (!preview) return;
                const opt = el.querySelector(`option[value="${value}"]`);
                preview.src = opt?.dataset.url || '';
            },
        });

        // Initial preview si une valeur est déjà sélectionnée
        const initOpt = el.querySelector(`option[value="${el.value}"]`);
        if (preview && initOpt?.dataset.url) preview.src = initOpt.dataset.url;
    });
</script>

