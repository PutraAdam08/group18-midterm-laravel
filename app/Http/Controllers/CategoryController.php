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

    public function edit_category($id,Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::findOrFail($id);
        $newData = [
            'nama'=>$request->name,
            'slug'=>Str::slug($request->name)
        ];
        $category->update($newData);
    }

    public function delete_category($id)
    {
        $category = Category::findorfail($id);
        $category->delete();
        //return redirect('/menus');
    }
}
