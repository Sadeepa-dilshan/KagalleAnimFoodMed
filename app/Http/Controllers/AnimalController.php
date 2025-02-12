<?php

namespace App\Http\Controllers;

use App\Repositories\AnimalRepositoryInterface;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    protected $animalRepo;

    public function __construct(AnimalRepositoryInterface $animalRepo)
    {
        $this->animalRepo = $animalRepo;
    }

    // GET /animals - Get paginated animals
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'data' => $this->animalRepo->getAllPaginated($request->query('search'), 10)->items()
            ]);
        }

        return view('backoffice.animals.index');
    }


    // GET /animals/{id} - Get a single animal
    public function show($id)
    {
        $animal = $this->animalRepo->findById($id);
        if (!$animal) {
            return response()->json(['error' => 'Animal not found'], 404);
        }
        return response()->json($animal);
    }

    // POST /animals - Store a new animal
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age_group' => 'nullable|in:Puppy,Adult,Senior',
        ]);

        return response()->json($this->animalRepo->create($validated), 201);
    }

    // PUT /animals/{id} - Update an animal
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'species' => 'string|max:255',
            'breed' => 'nullable|string|max:255',
            'age_group' => 'nullable|in:Puppy,Adult,Senior',
        ]);

        return response()->json($this->animalRepo->update($id, $validated));
    }

    // DELETE /animals/{id} - Delete an animal
    public function destroy($id)
    {
        return response()->json(['deleted' => $this->animalRepo->delete($id)]);
    }
}
