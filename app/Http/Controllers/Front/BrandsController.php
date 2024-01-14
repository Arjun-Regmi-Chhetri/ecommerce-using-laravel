<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\back\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    //
    public function index(Brand $brand){
        $products =$brand->products()->where('status','Active')->latest()->paginate(25);

        return view('front.brand.index',compact('products','brand'));
    }
}
