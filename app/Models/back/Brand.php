<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=['name','slug','file','status'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
