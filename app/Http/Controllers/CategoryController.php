<?php

namespace App\Http\Controllers;
use App\Models\GameCategory;
use App\Models\GameType;
use App\Models\Level;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(GameCategory $category)
    {
        $id=$category->id;
        $name=$category->name;
        $types=GameType::where('game_category_id', $id)->get();
        //Ne récupère que les id pour ensuite prendre les bons levels
        $types_id=GameType::where('game_category_id', $id)->pluck('id');
        $levels=Level::whereIn('game_type_id', $types_id)->get();
        return view('student.level', compact('id', 'name', 'types', 'levels'));
    }
}
