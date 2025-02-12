<?php

namespace App\Http\Controllers;

use App\Repositories\AnimalFoodRepositoryInterface;
use App\Models\Animal;
use App\Models\Food;
use Illuminate\Http\Request;

class AnimalFoodController extends Controller
{
    protected $animalFoodRepo;

    public function __construct(AnimalFoodRepositoryInterface $animalFoodRepo)
    {
        $this->animalFoodRepo = $animalFoodRepo;
    }

    public function index(Request $request)
{
    if ($request->expectsJson()) {
        $search = $request->query('search'); // Accept search parameter
        $data = $this->animalFoodRepo->getAllPaginated($search, 10);

        return response()->json([
            'data' => $data->items()
        ]);
    }

    $animals = \App\Models\Animal::select('id', 'name')->get();
    $foods = \App\Models\Food::select('id', 'name')->get();

    return view('backoffice.animal-foods.index', compact('animals', 'foods'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'food_ids' => 'required|array',
            'food_ids.*' => 'exists:foods,id'
        ]);

        $this->animalFoodRepo->assignFoods($validated['animal_id'], $validated['food_ids']);

        return response()->json(['message' => 'Animal-Food relationship updated successfully!']);
    }

    public function show($animalId)
    {
        return response()->json($this->animalFoodRepo->show($animalId));
    }

    public function update(Request $request, $animalId)
    {
        $validated = $request->validate([
            'food_ids' => 'required|array',
            'food_ids.*' => 'exists:foods,id',
        ]);

        $this->animalFoodRepo->updateFoods($animalId, $validated['food_ids']);

        return response()->json(['message' => 'Animal food assignments updated successfully!']);
    }

    public function destroy($id)
    {
        $this->animalFoodRepo->removeFood($id);
    
        return response()->json([
            'message' => 'Food removed from animal successfully!'
        ]);
    }
}
