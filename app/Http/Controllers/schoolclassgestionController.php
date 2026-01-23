<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\AddClassRequest;

class schoolclassgestionController extends Controller
{
    public function add(AddClassRequest $request)
    {
        $schoolClass = SchoolClass::create([
            'name'=>$request->input('SchoolClass_name'),
            'class_code'=>$request->input('SchoolClass_code'),
            'teacher_id'=>auth('teacher')->user()->id
        ]);
        return redirect()->route('teacher.schoolclass_gestion')->with('success', "La classe a été créée.");
    }

    public function showstudents($id)
    {
        $students = Student::orderBy('first_name', 'asc')->where('school_class_id', $id)->get();
        $schoolClass = SchoolClass::where('id', $id)->first();
        return view('teacher.studentgestion', compact('students', 'schoolClass'));
    }

    public function update(AddClassRequest $request, SchoolClass $schoolClass)
    {
        //valide les données
        $data = $request->validated();
        //renomme les champs pour correspondre à la base et l'update
        $schoolClass->update([
            'name'       => $data['SchoolClass_name'],
            'class_code' => $data['SchoolClass_code'],
        ]);
        
        return redirect()->route('teacher.student_gestion', ['id'=>$schoolClass->id])->with('success', "La classe a été modifiée.");
    }

    public function delete(SchoolClass $schoolClass)
    {
        $schoolClass->delete();
        return redirect()->route('teacher.schoolclass_gestion')->with('success', "La classe a été supprimée.");
    }
}
