<?php

namespace App\Http\Controllers;

use App\Models\GameCategory;
use App\Models\Student;
use Illuminate\Http\Request;

class GameCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Student $student)
    {
        $id = $student->id;
        $name = $student->first_name;
        $categories = GameCategory::all();
        return view('student.index', compact('id', 'name', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
