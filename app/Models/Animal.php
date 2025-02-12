<?php
namespace App\Models;

use App\Models\Food;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animals'; // Explicit table name (optional)

    protected $fillable = [
        'name',
        'species',
        'breed',
        'age_group',
    ];

    protected $casts = [
        'age_group' => 'string', // Ensures ENUM is treated as a string
    ];

    /**
     * Scope for filtering by age group.
     */
    public function scopeByAgeGroup($query, $ageGroup)
    {
        return $query->where('age_group', $ageGroup);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'animal_food', 'animal_id', 'food_id')
            ->withPivot('id')
            ->withTimestamps();
    }
    
}
