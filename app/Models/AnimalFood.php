<?php

namespace App\Models;

use App\Models\Food;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnimalFood extends Model
{
    use HasFactory;

    protected $table = 'animal_food'; // Explicitly set pivot table name

    protected $fillable = ['animal_id', 'food_id'];

    public $timestamps = false; // Pivot tables usually don’t need timestamps

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}
