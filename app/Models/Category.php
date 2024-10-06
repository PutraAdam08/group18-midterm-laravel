<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Brand;
use App\Models\Card;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function brand() :BelongsTo{
        return $this->belongsTo(Brand::class);
    }

    public function card() :HasMany{
        return $this->hasMany(Card::class);
    }
}
