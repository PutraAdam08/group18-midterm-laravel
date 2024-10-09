<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create_category(Request $request){
        $request->validate(
            ['name'=>'required'],
            ['name.required'=>'Category name cannot be empty']
        );
        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name)
        ]);
    }
}
