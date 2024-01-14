<?php


namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\back\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('featured','Yes')->where('status','Active')->limit(4)->get();
        $latestProducts = Product::where('featured','Yes')->latest()->limit(4)->get();
        $topSellingProducts = Product::where('featured','Yes')->where('status','Active')->limit(4)->get();
        return view('front.home.home',compact('featuredProducts','latestProducts','topSellingProducts'));
    }
}
