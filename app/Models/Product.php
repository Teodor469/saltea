<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    
    protected $fillable = [
        'title',
        'images',
        'price',
        'description',
        'ingredients',
        'benefits'
    ];

    protected $casts = [
        'images' => 'array',
        'ingredients' => 'array',
        'benefits' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function($product) {
            $product->user_id = auth()->id(); //!Always validated the user_id as well.
        });
    }
}
