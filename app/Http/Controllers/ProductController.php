<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Show list of products with pagination and sorting
    public function index(Request $request)
    {
        $search = $request->get('search');
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');

        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        }

        $products = $query->orderBy($sort, $direction)->paginate(10);
        return view('products.index', compact('products', 'sort', 'direction'));
    }

    // Show form for creating a new product
    public function create()
    {
        return view('products.create');
    }

    // Store newly created product in the database with image upload handling
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'brand_id'    => 'required|integer',
            'category_id' => 'required|integer',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload
        $image = $request->file('image');
        $imagePath = $image ? $image->storeAs('public/products', $image->hashName()) : null;

        // Create the product
        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'brand_id'    => $request->brand_id,
            'category_id' => $request->category_id,
            'image'       => $image ? $image->hashName() : null,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Show form for editing the specified product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in the database, with image upload handling
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'brand_id'    => 'required|integer',
            'category_id' => 'required|integer',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            // Delete the old image
            if ($product->image) {
                Storage::delete("public/products/{$product->image}");
            }

            // Update the product with the new image
            $product->update([
                'name'        => $request->name,
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock,
                'brand_id'    => $request->brand_id,
                'category_id' => $request->category_id,
                'image'       => $image->hashName(),
            ]);
        } else {
            // Update the product without changing the image
            $product->update([
                'name'        => $request->name,
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock,
                'brand_id'    => $request->brand_id,
                'category_id' => $request->category_id,
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from the database
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete("public/products/{$product->image}");
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}