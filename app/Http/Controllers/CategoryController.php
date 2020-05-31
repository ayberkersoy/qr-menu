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
}
