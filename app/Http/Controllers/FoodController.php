<?php

namespace App\Http\Controllers;

use App\Repositories\FoodRepositoryInterface;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    protected $foodRepo;

    public function __construct(FoodRepositoryInterface $foodRepo)
    {
        $this->foodRepo = $foodRepo;
    }

    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'data' => $this->foodRepo->getAllPaginated($request->query('search'), 10)->items()
            ]);
        }
    
        $categories = \App\Models\FoodCategory::select('id', 'name','species')->get();
        return view('backoffice.foods.index',compact('categories'));
    }

    // GET /food/{id} - Get a single food
    public function show($id)
    {
        $food = $this->foodRepo->findById($id);
        if (!$food) {
            return response()->json(['error' => 'Animal not found'], 404);
        }
        return response()->json($food);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:foods|max:255',
            'food_category_id' => 'required|exists:food_categories,id',
        ]);

        $this->foodRepo->create($validated);
        return response()->json(['message' => 'Food created successfully']);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:foods,name,' . $id,
            'food_category_id' => 'required|exists:food_categories,id',
        ]);

        $updatedFood = $this->foodRepo->update($id, $validated);

        return response()->json([
            'message' => 'Food updated successfully!',
            'food' => $updatedFood
        ]);
    }

    public function destroy($id)
    {
        $this->foodRepo->delete($id);
        return response()->json(['message' => 'Food deleted successfully']);
    }
}
