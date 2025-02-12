<?php
namespace App\Repositories;

use App\Models\Animal;
use Illuminate\Pagination\LengthAwarePaginator;

interface AnimalRepositoryInterface {
    public function getAllPaginated(?string $search = null,int $perPage = 10): LengthAwarePaginator;
    public function findById(int $id): ?Animal;
    public function create(array $data): Animal;
    public function update(int $id, array $data): ?Animal;
    public function delete(int $id): bool;
}
