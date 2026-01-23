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
        if(auth('teacher')->user()->id == $schoolClass->teacher_id){
            $student = Student::create([
                'first_name'=>$request->input('first_name'),
                'last_name'=>$request->input('last_name'),
                'school_class_id'=>$schoolClass->id
                //Ajouter l'image animal aléatoire
            ]);
            return redirect()->route('teacher.student_gestion', $schoolClass->id)->with('success', "L'élève a été ajouté.");
        }else{
            return redirect()->route('teacher.student_gestion', $schoolClass->id)->with('error', "Vous n'êtes pas autorisé à ajouter un élève dans cette classe.");
        }
        
    }

    public function deletestudent(SchoolClass $schoolClass, Student $student)
    {
            //Uniquement le prof de la classe est autorisé à la supprimer
            if(auth('teacher')->user()->id == $schoolClass->teacher_id){
                $student->delete();
                return redirect()->route('teacher.student_gestion', ['id'=>$schoolClass->id])->with('success', "L'élève a été supprimée.");
            }else{
                return redirect()->route('teacher.student_gestion', ['id'=>$schoolClass->id])->with('error', "Vous n'êtes pas autorisé à supprimer cette classe.");
            }
    }

    public function showstudent(SchoolClass $schoolClass, Student $student)
    {
        $student_selected = Student::where('school_class_id', $schoolClass->id)->where('id', $student->id)->first();
        return view('teacher.student', compact('student_selected', 'schoolClass'));
    }
}
