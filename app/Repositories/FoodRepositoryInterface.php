<?php
namespace App\Repositories;

use App\Models\Food;
use Illuminate\Pagination\LengthAwarePaginator;

interface FoodRepositoryInterface {
    public function getAllPaginated(?string $search = null,int $perPage = 10): LengthAwarePaginator;
    public function findById(int $id): ?Food;
    public function create(array $data): Food;
    public function update(int $id, array $data): ?Food;
    public function delete(int $id): bool;
}
