<?php

namespace App\Http\Controllers;
use App\Models\SchoolClass;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showclasses()
    {
        $schoolClasses = SchoolClass::get();
        return view('teacher.schoolclassgestion', compact('schoolClasses'));
    }
}
