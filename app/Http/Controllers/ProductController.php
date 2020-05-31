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
            'description' => 'required',
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

        return back();
    }

    public function index()
    {

    }

    public function edit(Product $product)
    {

    }

    public function update(Product $product)
    {

    }

    public function destroy(Product $product)
    {

    }
}
