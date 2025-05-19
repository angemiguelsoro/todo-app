<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Affiche la liste des tâches
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Affiche le formulaire pour créer une nouvelle tâche
    public function create()
    {
        return view('tasks.create');
    }

    // Enregistre une nouvelle tâche
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche ajoutée avec succès.');
    }

    // Affiche le formulaire d’édition d’une tâche
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Met à jour une tâche existante
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'completed' => 'boolean',
        ]);

        $task->update([
            'title' => $request->title,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Supprime une tâche
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
