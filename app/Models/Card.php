<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'stock',
        'image',
        'brand_id',
        'category_id'
    ];

    protected $with = ['brand', 'category'];

    public function brand(): BelongsTo{
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }


}
