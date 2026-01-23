<?php

namespace App\Http\Controllers;
use App\Models\SchoolClass;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showview()
    {
        $filter = 'Personnal';
        $schoolClasses = SchoolClass::orderBy('name', 'asc')->where('teacher_id', auth('teacher')->user()->id)->get(); //permet un tri par ordre alphabétique
        return view('teacher.schoolclassgestion', compact('schoolClasses', 'filter'));
    }

    public function showclasses(Request $request)
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
