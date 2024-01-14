<?php

namespace App\Models\back;


use App\Models\Reviews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



    protected $fillable = ['title','slug,','price','stock_qty','discount_price','file','category_id','brand_id','status','description','summary'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

//    protected $casts =[
//        'file'=>'array'
//    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

//    public function getThumbnailAttribute()
//    {
//        return $this->file[0];
//    }


}
