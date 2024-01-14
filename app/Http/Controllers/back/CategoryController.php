<?php

namespace App\Http\Controllers\back;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\back\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use function PHPUnit\Framework\isNull;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return view('back.category.index',compact('categories'));
    }


    public  function create(){
        return view('back.category.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'status'=>'required|in:Active,Inactive',
            'slug'=>'required|unique:categories,slug'
        ]);

        $category = new Category();

        $category->title = $request->title;
        $category->status = $request->status;
        $category->slug = $request->slug;


          $slug = Category::where('slug', $category->slug)->exists();
            if( $slug == $category){
                $str = Str::slug($category->slug,'');
                $count = Category::where('slug', 'LIKE', "{$category->slug}%",)->count();
                $inc = $count++;
                $category->slug="$request->slug-$inc";
            }else{
                $category->slug = $request->slug;
            }





         $category->save();

        return redirect()->route('back.category.index');

    }


    public function edit(Category $category){
        return view('back.category.edit',compact('category'));
    }

    public function update(Request $request, Category $category){
        $this->validate($request,[
            'title'=>'required',
            'status'=>'required|in:Active,Inactive',
            'slug'=>'required|unique:categories,slug'
        ]);
        $category->title = $request->title;
        $category->status = $request->status;
        $category->slug = $request->slug;

        if($category->slug == $request->slug){

            $check = Category::select('id')->where('slug', $request->slug)->exists();

            if($check == $category){
                return ('Slug already been taken');
            };
        }



        $category->update();
        return redirect()->route('back.category.index');


    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('back.category.index');
    }

}
