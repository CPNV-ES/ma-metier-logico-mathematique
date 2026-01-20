<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show(Student $student)
    {
        $id=$student->id;
        $name=$student->first_name;
        return view('student.index', compact('id', 'name'));
    }
}
