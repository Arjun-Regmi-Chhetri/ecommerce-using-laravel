<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable=['name','slug','image','status'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
