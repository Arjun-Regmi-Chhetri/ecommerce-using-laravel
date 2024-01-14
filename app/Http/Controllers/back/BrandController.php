<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::paginate(10);
        return view('back.brand.index',compact('brands'));
    }
    public function create(){
        return view('back.brand.create');
    }
    public function store(Request $request){

        $this->validate($request,[
            'title'=>'required',
            'slug'=>'required|unique:brands,slug',
            'file'=>'Image|nullable|max:2048',
            'status'=>'required|in:Active,Inactive'
        ]);

        if($request->hasFile('file')){
            $fullname = $request->file('file')->getClientOriginalName();

            $extension= $request->file('file')->getClientOriginalExtension();

            $filname = pathinfo($fullname, PATHINFO_FILENAME);

            $imagename = $filname.'_'.time().'.'.$extension;

           $path = $request->file('file')->storeAs('public/image/brands', $imagename);
        }else{
            $imagename="noimage.jpg";
        }

        $brand = new Brand();

        $brand->name = $request->title;
        $brand->slug = $request->slug;
        $brand->file = $imagename;
        $brand->status = $request->status;

        $brand->save();

        return redirect()->route('back.brand.index');

    }


}
