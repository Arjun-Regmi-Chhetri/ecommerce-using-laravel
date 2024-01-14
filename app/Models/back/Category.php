<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = [
        'title','slug','status'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
