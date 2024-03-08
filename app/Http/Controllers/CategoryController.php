<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categories()
    {
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }

}
