<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\GameCategory;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show(Student $student)
    {
        $id=$student->id;
        $name=$student->first_name;
        $categories=GameCategory::all();
        return view('student.index', compact('id', 'name', 'categories'));
    }

    public function resolveCategorypage($id){
        $category = GameCategory::where('id', $id)->first();
        return redirect()->route('homepage.categories.show', [
            'category' => $category->id,
        ]);
    }
}
