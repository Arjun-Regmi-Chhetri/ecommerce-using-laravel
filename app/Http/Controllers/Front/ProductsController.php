<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\back\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index(Product $product)
    {
        $similarProducts = Product::where('category_id',$product->category->id)->where('id','!=',$product->id)->
        inRandomOrder()->limit(4)->get();

        $reviews = $product->reviews;

        $average = round($reviews->avg('rating'),'1');
        if($reviews->count()>0){
            $ratings = [
                '5'=>round($reviews->where('rating','5')->count()/$reviews->count() *100,2),
                '4'=>round($reviews->where('rating','4')->count()/$reviews->count() *100,2),
                '3'=>round($reviews->where('rating','3')->count()/$reviews->count() *100,2),
                '2'=>round($reviews->where('rating','2')->count()/$reviews->count() *100,2),
                '1'=>round($reviews->where('rating','1')->count()/$reviews->count() *100,2),
            ];
        }else
        {
            $ratings = [
                '5'=>0,
                '4'=>0,
                '3'=>0,
                '2'=>0,
                '1'=>0,
            ];
        }

        return view('front.product.index',compact('product','similarProducts','reviews','average','ratings'));
    }

}
