<?php


use App\Http\Controllers\back\BackController;
use App\Http\Controllers\back\CategoryController;
use App\Http\Controllers\back\ProductController;
use App\Http\Controllers\back\BrandController;
use App\Http\Controllers\back\SliderController;

use App\Http\Controllers\Front\BrandsController;
use App\Http\Controllers\Front\CategoriesController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductsController as DetailedController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Auth::Route();


Auth::routes();


Route::prefix('cms')->group(function(){
    Route::name('back.')->group(function(){

            Route::get('/dashboard',[BackController::class, 'index'])->name('dashboard.index');
            Route::get('/dashboard/product',[BackController::class, 'product']);
            Route::resource('/dashboard/slider',SliderController::class)->except('slider.show');
            Route::resource('/dashboard/brand', BrandController::class)->except('show');
            Route::resource('/dashboard/category', CategoryController::class)->except('show');
            Route::resource('/dashboard/product', ProductController::class)->except('show');

            Route::get('/get-slug/{string}',function($string){
                return \Illuminate\Support\Str::of($string)->replace('&','and')->slug();
            });
    });
});


Route::name('front.')->group(function(){
    Route::get('/product/{product}',[DetailedController::class,'index'])->name('product.show');
    Route::get('/brand/{brand}',[BrandsController::class,'index'])->name('brand.show');
    Route::get('/category/{category}',[CategoriesController::class,'index'])->name('category.show');
    Route::get('/', [HomeController::class,'index'])->name('home.show');
});

//Route::get('/cms/dashboard/index',[BackController::class, 'index']);
//Route::get('/cms/dashboard/product',[BackController::class, 'product']);
//Route::get('/cms/dashboard/category',[CategoriesController::class, 'category'])->except('show');
//Route::get('/cms/dashboard/category/add_category',[CategoriesController::class,'AddCategory']);
//Route::post('/cms/dashboard/category/save_category',[CategoriesController::class,'store']);
//Route::get('/cms/dashboard',[BackController::class, 'dashboard']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
