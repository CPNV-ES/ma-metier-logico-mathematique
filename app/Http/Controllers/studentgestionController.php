<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AddStudentRequest;

class studentgestionController extends Controller
{
    public function addstudent(AddStudentRequest $request, SchoolClass $schoolClass)
    {
        $student = Student::create([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'school_class_id'=>$schoolClass->id
            //Ajouter l'image animal aléatoire
        ]);
        return redirect()->route('teacher.student_gestion', $schoolClass->id)->with('success', "L'élève a été ajouté.");
    }
}
