<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Add stock, brand_id, and category_id to the fillable array
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'stock',
        'brand_id',
        'category_id'
    ];
}
