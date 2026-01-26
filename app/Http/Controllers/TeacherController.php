<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
        return view('teachers.create');
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

    public function showClasses()
    {
        $filter = 'Personnal';
        $schoolClasses = SchoolClass::orderBy('name', 'asc')->where('teacher_id', auth('teacher')->user()->id)->get(); //permet un tri par ordre alphabétique
        return view('teacher.schoolclassgestion', compact('schoolClasses', 'filter'));
    }

    public function showClassesFilter(Request $request)
    {
        $filter = $request->schoolClasses; //conserve le filtre pour le transmettre à la vue
        if($filter == 'all'){
            $schoolClasses = SchoolClass::orderBy('name', 'asc')->get(); //permet un tri par ordre alphabétique
        }
        else
        {
            $schoolClasses = SchoolClass::orderBy('name', 'asc')->where('teacher_id', auth('teacher')->user()->id)->get(); //permet un tri par ordre alphabétique
        }
        return view('teacher.schoolclassgestion', compact('schoolClasses', 'filter'));
    }
}
