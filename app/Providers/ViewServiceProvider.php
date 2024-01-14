<?php

namespace App\Providers;

use App\Models\back\Brand;
use App\Models\back\Category;


use App\Models\back\Slider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['back.product.create','back.product.edit'],function ($view){
            $categories = Category::where('status','Active')->get()->pluck('title','id');
            $brands = Brand::where('status','Active')->get()->pluck('name','id');
            $view->with(compact('categories','brands'));
        });
        View::composer(['front.template.header'],function ($view){
            $categories = Category::where('status', 'Active')->get()->pluck('title','slug');
            $view->with(compact('categories'));
        });
        View::composer(['front.template.slider'],function ($view){
            $sliders = Slider::where('status','Active')->get()->pluck('file','file');
            $view->with(compact('sliders'));
        });

    }
}
