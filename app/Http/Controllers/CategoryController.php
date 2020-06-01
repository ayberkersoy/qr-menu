<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('categories');
            Image::create([
                'related_id' => $category->id,
                'type' => Image::Category,
                'order' => 1,
                'path' => $path
            ]);
        }

        return back()->with('success', 'Kategori eklendi.');
    }

    public function index()
    {
        $categories = Category::with('products')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('categories');
            $image = $category->image()->latest();
            $image->delete();
            Image::create([
                'related_id' => $category->id,
                'type' => Image::Category,
                'order' => 1,
                'path' => $path
            ]);
        }

        return back()->with('success', 'Kategori güncellendi.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori silindi.');
    }
}
