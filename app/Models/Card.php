<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
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
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'brand_id',
        'category_id'
    ];

    protected $with = ['brand', 'category'];

    
    public function scopeFilter(Builder $query, array $filters):void{
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) => 
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) => 
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );
        
    }
    

    public function brand(): BelongsTo{
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }


}
