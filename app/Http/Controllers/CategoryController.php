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
            'title' => ['required', 'string', 'max:255'],
            'description' => 'required',
            'cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
        ]);

        $coverName = time() . '.' . $request->file('cover')->extension();
        $request->file('cover')->storeAs('public/image', $coverName);

        Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $coverName,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.create_category', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        if ($request->hasFile('cover')) {
            $coverName = time() . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('public/categories', $coverName);
            $category->cover = $coverName;
        }

        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

}
