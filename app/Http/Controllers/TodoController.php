<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    // GET /api/todos - List all todos for the authenticated user
    public function index()
    {
        $todos = Todo::query()->where('user_id', auth()->user()->id)->get();
        return response()->json($todos);
    }

    // POST /api/todos - Create a new todo
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = Todo::query()->create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($todo, 201);
    }

    // PUT /api/todos/{id} - Update an existing todo
    public function update(Request $request, $id)
    {
        $todo = Todo::query()->where('user_id', auth()->user()->id)->findOrFail($id);

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo->update($request->only('title', 'description'));

        return response()->json($todo);
    }

    // DELETE /api/todos/{id} - Delete a todo
    public function destroy($id)
    {
        $todo = Todo::query()->where('user_id', auth()->user()->id)->findOrFail($id);
        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully']);
    }
}
