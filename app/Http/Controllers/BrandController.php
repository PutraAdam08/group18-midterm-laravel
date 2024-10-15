<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function create_brand(Request $request){
        $request->validate(
    [
                'name'=>'required'
            ]
        );
        
        $slug = Str::slug($request->name);

        Brand::create([
            'name'=>$request->name,
            'slug'=>$slug
        ]);
    }

    public function edit_brand($id,Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $brand = Brand::findOrFail($id);
        $newData = [
            'nama'=>$request->name,
            'slug'=>Str::slug($request->name)
        ];
        $brand->update($newData);
    }

    public function delete_brand($id)
    {
        $brand = Brand::findorfail($id);
        $brand->delete();
        //return redirect('/menus');
    }
}
