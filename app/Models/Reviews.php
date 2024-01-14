<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable =['comment','rating','product_id','user_id'];

    public function product()
    {
        return $this->belongsTo(Back\Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
