<?php
namespace App\Repositories;

use App\Models\Animal;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

class AnimalRepository implements AnimalRepositoryInterface
{
    public function getAllPaginated(string $search = null, int $perPage = 10): LengthAwarePaginator
    {
        $query = Animal::select('id', 'name', 'species', 'breed', 'age_group');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('species', 'LIKE', "%{$search}%")
              ->orWhere('breed', 'LIKE', "%{$search}%")
              ->orWhere('age_group', 'LIKE', "%{$search}%");
        });
    }

    return $query->paginate($perPage);
    }

    public function findById(int $id): ?Animal
    {
        return Animal::find($id);
    }    

    public function create(array $data): Animal
    {
        $animal = Animal::create($data);
        Cache::forget("animals_page_10"); // Clear cache after insertion
        return $animal;
    }

    public function update(int $id, array $data): ?Animal
    {
        $animal = Animal::findOrFail($id);
        $animal->update($data);
        return $animal;
    }

    public function delete(int $id): bool
    {
        return Animal::destroy($id);
    }
}
