<?php

namespace App\Http\Controllers\back;

use App\Models\back\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('back.product.index',compact('products'));
    }
    public function create(){
        return view('back.product.create');
    }
    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required|unique:products,slug',
            'description'=>'required',
            'summary'=>'required',
            'price'=>'required',
            'discount_price'=>'nullable|numeric',
            'stock_qty'=>'required',
            'category_id'=>'required|exists:categories,id',
            'brand_id'=>'required|exists:brands,id',
            'file'=>'Image|nullable|max:2048',
            'status'=>'required|in:Active,Inactive',
            'featured'=>'required|in:Yes,No',
        ]);

        if($request->hasFile('file')){
            $fullname = $request->file('file')->getClientOriginalName();

            $extension= $request->file('file')->getClientOriginalExtension();

            $filname = pathinfo($fullname, PATHINFO_FILENAME);

            $imagename = $filname.'_'.time().'.'.$extension;

            $path = $request->file('file')->storeAs('public/image/products', $imagename);
        }else{
            $imagename="noimage.jpg";
        }

        $product = new Product();

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->summary = $request->summary;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->stock_qty = $request->stock_qty;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->file = $imagename;
        $product->status = $request->status;
        $product->featured = $request->featured;

        $product->save();

        return redirect()->route('back.product.index');
    }

    public function edit(Product $product){
        return view('back.product.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {

        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required|unique:products,slug',
            'description'=>'required',
            'summary'=>'required',
            'price'=>'required',
            'discount_price'=>'nullable|numeric',
            'stock_qty'=>'required',
            'category_id'=>'required|exists:categories,id',
            'brand_id'=>'required|exists:brands,id',
            'file'=>'Image|nullable|max:2048',
            'status'=>'required|in:Active,Inactive',
            'featured'=>'required|in:Yes,No',
        ]);


        if($request->hasFile('file')){
            $fullname = $request->file('file')->getClientOriginalName();

            $extension= $request->file('file')->getClientOriginalExtension();

            $filname = pathinfo($fullname, PATHINFO_FILENAME);

            $imagenames = $filname.'_'.time().'.'.$extension;

            $path = $request->file('file')->storeAs('public/image/products', $imagenames);


        }else{
            $imagenames="noimage.jpg";
        }

        if($product->file != "noimage.jpg"){
            Storage::delete('public/image/products/'.$product->file);
        }

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->summary = $request->summary;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->stock_qty = $request->stock_qty;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->status = $request->status;
        $product->featured = $request->featured;
        $product->file = $imagenames;




        $product->update();

        return redirect()->route('back.product.index');
    }



    public function  destroy(Product $product){
        if($product->file != "noimage.jpg"){
            Storage::delete('public/image/products/'.$product->file);
        }
        $product->delete();
        return redirect()->route('back.product.index');
    }
}
