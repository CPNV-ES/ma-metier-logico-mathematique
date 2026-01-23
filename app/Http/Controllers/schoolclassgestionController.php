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
        $students = Student::where('school_class_id', $id)->get();
        return view('teacher.studentgestion', compact('students'));
    }
}
