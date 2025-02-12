<?php
namespace App\Repositories;

use App\Models\Food;
use Illuminate\Pagination\LengthAwarePaginator;

class FoodRepository implements FoodRepositoryInterface
{
    public function getAllPaginated(string $search = null, int $perPage = 10): LengthAwarePaginator
    {
        $query = Food::select('id', 'name', 'food_category_id')->with(['category:id,name']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            });
        }

        return $query->orderBy('name')->paginate($perPage);
    }

    public function findById(int $id): ?Food
    {
        return Food::find($id);
    }

    public function create(array $data): Food
    {
        return Food::create($data);
    }

    public function update(int $id, array $data): ?Food
    {
        $food = Food::findOrFail($id);
        $food->update($data);
        return $food;
    }

    public function delete(int $id): bool
    {
        return Food::destroy($id);
    }
}
