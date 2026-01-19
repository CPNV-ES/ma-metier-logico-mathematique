<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomepageController extends Controller
{
    //appelle la page d'accueil
    public function index (): View {
        return view('homepage.index');
    }

    //redirige vers une classe en fonction du code
    public function resolveClassByCode(Request $request){
        $request->validate([
            'class_code' => ['required'],
        ], [
            'class_code.required' => 'Veuillez entrer un code de classe.',
        ]);

        $schoolClass = SchoolClass::where('class_code', $request->class_code)->first();

        if (! $schoolClass) {
            return back()->withErrors([
                'class_code' => 'Ce code de classe est invalide.',
            ]);
        }

        return redirect()->route('homepage.classes.show', [
            'schoolClass' => $schoolClass->id,
        ]);
    }
}
