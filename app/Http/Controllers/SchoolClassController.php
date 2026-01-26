<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClassRequest;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schoolClass = SchoolClass::create([
            'name'=>$request->input('SchoolClass_name'),
            'class_code'=>$request->input('SchoolClass_code'),
            'teacher_id'=>auth('teacher')->user()->id
        ]);
        return redirect()->route('teacher.schoolclass_gestion')->with('success', "La classe a été créée.");

    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolClass $schoolClass)
    {
        //récupère la valeur de l'id de la classe ouverte
        $id = $schoolClass->id;
        $className = $schoolClass->name;
        //cherche les élèves présents dans cette classe
        $students = Student::where('school_class_id', $id)->get();
        //appelle la vue et transmet les données des élèves à la vue
        return view('schoolclass.show', compact('students','className'));
    }

    public function resolveStudentpage($id){
        $student = Student::where('id', $id)->first();
        return redirect()->route('homepage.gameCategories.index', [
            'student' => $student->id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddClassRequest $request, SchoolClass $schoolClass)
    {
        //Uniquement le prof de la classe est autorisé à la modifier
        if(auth('teacher')->user()->id == $schoolClass->teacher_id){
            //valide les données
            $data = $request->validated();
            //renomme les champs pour correspondre à la base et l'update
            $schoolClass->update([
                'name'       => $data['SchoolClass_name'],
                'class_code' => $data['SchoolClass_code'],
            ]);
            return redirect()->route('teacher.student_gestion', ['id'=>$schoolClass->id])->with('success', "La classe a été modifiée.");
        }else{
            return redirect()->route('teacher.student_gestion', ['id'=>$schoolClass->id])->with('error', "Vous n'êtes pas autorisé à modifier cette classe.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolClass $schoolClass)
    {
        try {
            //Uniquement le prof de la classe est autorisé à la supprimer
            if(auth('teacher')->user()->id == $schoolClass->teacher_id){
                $schoolClass->delete();
                return redirect()->route('teacher.schoolclass_gestion')->with('success', "La classe a été supprimée.");
            }else{
                return redirect()->route('teacher.student_gestion', ['id'=>$schoolClass->id])->with('error', "Vous n'êtes pas autorisé à supprimer cette classe.");
            }
        } catch (\Exception $e){
            //renvoie une erreur si la classe n'est pas vide (sans élève)
            return redirect()->route('teacher.student_gestion', ['id'=>$schoolClass->id])->with('error', "La classe ne peut pas être supprimée, elle contient encore des élèves.");
        }
    }

    public function showStudents($id)
    {
        $students = Student::orderBy('first_name', 'asc')->where('school_class_id', $id)->get();
        $schoolClass = SchoolClass::where('id', $id)->first();
        return view('teacher.studentgestion', compact('students', 'schoolClass'));
    }
}
