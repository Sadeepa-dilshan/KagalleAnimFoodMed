<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('front.add-user');
    }

    // Store the new user
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|max:15',
            'role' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user in the database
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->mobile = $validated['mobile'];
        $user->role = $validated['role'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->back()->with('success', 'User created successfully!');
    }
    
    // Return the users
    public function index(Request $request)
    {
        $type = $request->input('type');

        $query = User::select('id', 'name', 'email', 'mobile', 'role');

        if ($type && $type !== 'all') {
            $query->where('role', $type);
        }

        $users = $query->paginate(10);

        return view('backoffice.users.index', compact('users'));
    }
    

    // Get a single user by ID
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    // Edit/update a user
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->role = $request->role;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return response()->json(['message' => 'User updated successfully']);
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
