<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    public function add_card(Request $request){
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     =>  'required',
            'description' => 'required',
            'price'   =>  'required',
            'stock' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $image->storeAs('cards', $image->hashName(), 'public');

        $card = Card::create([
            'image'     =>  $image->hashName(),
            'title'     =>  $request->title,
            'slug'      => Str::slug($request->title),
            'description' => $request->description,
            'price'   =>  $request->price,
            'stock' => $request->stock,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id
        ]);

        return redirect('/');
    }

    public function edit_card($id, Request $request){
        $validator = Validator::make($request->all(), [
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     =>  'required',
            'description' => 'required',
            'price'   =>  'required',
            'stock' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $card = Card::findOrFail($id);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image->storeAs('cards', $image->getClientOriginalName(), 'public');

            Storage::delete("cards/$card->image");

            $card->update([
                'image'     =>  $image->getClientOriginalName(),
                'title'     =>  $request->title,
                'slug'      => Str::slug($request->title),
                'description' => $request->description,
                'price'   =>  $request->price,
                'stock' => $request->stock,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id
            ]);
        }else{
            $card->update([
                'title'     =>  $request->title,
                'slug'      => Str::slug($request->title),
                'description' => $request->description,
                'price'   =>  $request->price,
                'stock' => $request->stock,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id
            ]);
        }
        return redirect('/');
    }
}
