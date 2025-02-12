<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodCategory;

class FoodCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Dry', 'species' => 'Dog'],
            ['name' => 'Wet', 'species' => 'Dog'],
            ['name' => 'Raw', 'species' => 'Dog'],
            ['name' => 'Dry', 'species' => 'Cat'],
            ['name' => 'Wet', 'species' => 'Cat'],
        ];

        foreach ($categories as $category) {
            FoodCategory::create($category);
        }
    }
}
