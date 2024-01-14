<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('back.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('back.slider.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'slug'=>'required|unique:sliders,slug',
            'file'=>'Image|nullable|max:2048',
            'status'=>'required|in:Active,Inactive',
            'featured' => 'required|in:Yes,No'
        ]);

        if ($request->hasFile('file')) {
            $fullname = $request->file('file')->getClientOriginalName();

            $extension= $request->file('file')->getClientOriginalExtension();

            $filname = pathinfo($fullname, PATHINFO_FILENAME);

            $imagename = $filname.'_'.time().'.'.$extension;

            $path = $request->file('file')->storeAs('public/image/sliders', $imagename);
        }else{
            $imagename="noimage.jpg";
        }

        $slider = new Slider();

        $slider->name = $request->name;
        $slider->slug = $request->slug;
        $slider->file =  $imagename;
        $slider->status = $request->status;
        $slider->featured = $request->featured;

        $slider->save();

        return redirect()->route('back.slider.index');
    }
}
