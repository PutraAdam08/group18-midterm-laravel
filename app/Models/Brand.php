<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Card;
use App\Models\Category;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    public function card() :HasMany{
        return $this->hasMany(Card::class);
    }
}