<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\back\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Category $category){
        $products = $category->products()->where('status','active')->latest()->paginate(25);
        return view('front.category.index', compact('products','category'));
    }
}
