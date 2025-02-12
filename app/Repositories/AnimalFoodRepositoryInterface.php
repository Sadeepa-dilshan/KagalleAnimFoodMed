<?php
namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface AnimalFoodRepositoryInterface {
    public function getAllPaginated(?string $search = null,int $perPage = 10): LengthAwarePaginator;
    public function assignFoods(int $animalId, array $foodIds): void;
    public function removeFood(int $id): void;
    public function updateFoods(int $animalId, array $foodIds): void;
    public function show(int $animalId); 
}
