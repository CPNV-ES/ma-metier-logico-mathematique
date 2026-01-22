<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExerciceRequest;
use App\Http\Requests\UpdateExerciceRequest;
use App\Models\Exercise;
use App\Models\GameCategory;
use App\Models\GameType;
use App\Models\Level;
use App\Models\Media;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gameCategories = GameCategory::all();
        $gameTypes = GameType::all();
        $levels = Level::all()
            ->unique('name')
            ->values();

        $media = Media::all();

        return view('exercise.create', compact('gameCategories', 'gameTypes', 'levels', 'media'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciceRequest $request, Exercise $exercice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercice)
    {
        //
    }
}
