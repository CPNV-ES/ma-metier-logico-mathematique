<?php

namespace App\Http\Controllers;
use App\Models\SchoolClass;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showclasses()
    {
        $schoolClasses = SchoolClass::orderBy('name', 'asc')->get(); //permet un tri par ordre alphabétique
        return view('teacher.schoolclassgestion', compact('schoolClasses'));
    }
}
