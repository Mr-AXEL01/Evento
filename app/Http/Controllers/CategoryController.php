<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create() {
        return view('admin.create_category');
    }

    public function categories()
    {
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('public/image');
            $validatedData['cover'] = str_replace('public/', 'storage/', $coverPath);
        }

        Category::create($validatedData);

        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

}
