<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryIndex()
    {
        $category = Category::all();
        // dd($Category->toArray());

        return view('dashboard.category.index', compact('category'));
    }
}
