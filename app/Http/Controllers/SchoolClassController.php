<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Models\Student;

class SchoolClassController extends Controller
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
    public function show(SchoolClass $schoolClass)
    {
        //récupère la valeur de l'id de la classe ouverte
        $id = $schoolClass->id;
        $className = $schoolClass->name;
        //cherche les élèves présents dans cette classe
        $students = Student::where('school_class_id', $id)->get();
        //appelle la vue et transmet les données des élèves à la vue
        return view('schoolclass.show', compact('students','className'));
    }

    public function resolveStudentpage($id){
        $student = Student::where('id', $id)->first();
        return redirect()->route('homepage.students.show', [
            'student' => $student->id,
        ]);
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
