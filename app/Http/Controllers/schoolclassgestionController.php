<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\AddClassRequest;

class schoolclassgestionController extends Controller
{
    public function add(AddClassRequest $request)
    {
        $schoolClass = SchoolClass::create([
            'name'=>$request->input('SchoolClass_name'),
            'class_code'=>$request->input('SchoolClass_code')
        ]);
        return redirect()->route('teacher.schoolclass_gestion')->with('success', "La classe a été créée.");
    }
}
