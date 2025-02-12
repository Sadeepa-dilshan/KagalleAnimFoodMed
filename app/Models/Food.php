<?php

namespace App\Models;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillable = ['name', 'food_category_id'];

    public function category()
    {
        return $this->belongsTo(FoodCategory::class, 'food_category_id');
    }
    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'animal_food', 'food_id', 'animal_id')
            ->withPivot('id')
            ->withTimestamps();
    }
    
}
