<?php

namespace App\Repositories;

use DB;
use Log;
use App\Models\Animal;
use Illuminate\Pagination\LengthAwarePaginator;

class AnimalFoodRepository implements AnimalFoodRepositoryInterface
{
    public function getAllPaginated(?string $search = null, int $perPage = 10): LengthAwarePaginator
    {
        $query = Animal::with('foods:id,name') // Ensure foods are loaded
            ->whereHas('foods') // Only get animals that have foods assigned
            ->select('id', 'name', 'species');

        if (!empty($search)) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        return $query->orderBy('name')->paginate($perPage);
    }

    public function assignFoods(int $animalId, array $foodIds): void
    {
        $animal = Animal::findOrFail($animalId);
        $animal->foods()->sync($foodIds);
    }

    public function show(int $animalId)
    {
        return Animal::with('foods:id,name')->findOrFail($animalId);
    }

    public function removeFood(int $id): void
    {
        \DB::table('animal_food')->where('id', $id)->delete();
    }

    public function updateFoods(int $animalId, array $foodIds): void
    {
        DB::table('animal_food')->where('animal_id', $animalId)->delete(); // Remove old assignments

        $data = [];
        foreach ($foodIds as $foodId) {
            $data[] = ['animal_id' => $animalId, 'food_id' => $foodId];
        }

        \DB::table('animal_food')->insert($data); // Insert new assignments
    }
}
