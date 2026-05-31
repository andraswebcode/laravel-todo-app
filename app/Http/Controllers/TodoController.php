<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(): View
    {
        $todos = Auth::user()
            ->todos()
            ->latest()
            ->get();

        return view('todos.index', compact('todos'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Auth::user()->todos()->create($validated);

        return redirect()->route('todos.index');
    }

    public function toggle(Todo $todo): RedirectResponse
    {
        abort_if($todo->user_id !== Auth::id(), 403);

        $todo->update([
            'is_completed' => ! $todo->is_completed,
        ]);

        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo): RedirectResponse
    {
        abort_if($todo->user_id !== Auth::id(), 403);

        $todo->delete();

        return redirect()->route('todos.index');
    }
}
