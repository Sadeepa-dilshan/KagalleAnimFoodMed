<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'species'];

    public function foods()
    {
        return $this->hasMany(Food::class, 'food_category_id'); // One category has many foods
    }
}

