<?php

namespace App\Http\Controllers;
use App\Models\GameCategory;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(GameCategory $category)
    {
        $id=$category->id;
        $name=$category->name;
        //$levels=GameCategory::all();
        return view('student.level', compact('id', 'name'));
    }
}
