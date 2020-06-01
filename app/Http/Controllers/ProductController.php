<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $product = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => Product::Available
        ]);

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('products');
            Image::create([
                'related_id' => $product->id,
                'type' => Image::Product,
                'order' => 1,
                'path' => $path
            ]);
        }

        return back()->with('success', 'Ürün eklendi.');
    }

    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status
        ]);

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('products');
            $image = $product->images()->latest();
            $image->delete();
            Image::create([
                'related_id' => $product->id,
                'type' => Image::Product,
                'order' => 1,
                'path' => $path
            ]);
        }

        return back()->with('success', 'Ürün güncellendi.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Ürün silindi.');
    }
}
