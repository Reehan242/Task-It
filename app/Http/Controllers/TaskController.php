<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // public function index()
    // {
    //     // Menampilkan semua task milik user
    //     $tasks = Task::where('user_id', Auth::id())->get();
    //     return view('tasks.index', compact('tasks'));
    // }

    public function index(Request $request)
    {
        // Default sorting
        $sortField = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'asc');

        // Menampilkan semua task milik user dengan sorting
        $tasks = Task::where('user_id', Auth::id())
            ->orderBy($sortField, $sortDirection)
            ->get();

        return view('tasks.index', compact('tasks', 'sortField', 'sortDirection'));
    }


    public function create()
    {
        // Menampilkan form untuk membuat task baru
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:not_start,in_progress,complete',
            'deadline' => 'required|date',
        ]);

        // Simpan task baru
        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('tasks.index')->with('success', 'A new task has been added.');
    }

    public function edit(Task $task)
    {
        // Cek apakah task milik user
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:not_start,in_progress,complete',
            'deadline' => 'required|date',
        ]);

        // Update task
        $task->update($request->only('title', 'description', 'status', 'deadline'));

        return redirect()->route('tasks.index')->with('success', "Task '" . $task->title . "' has been updated.");
    }

    public function destroy(Task $task)
    {
        // Cek apakah task milik user
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', "Task '" . $task->title . "' has been deleted.");
    }

    // public function filterByStatus($status)
    // {
    //     // Filter task berdasarkan status
    //     $tasks = Task::where('user_id', Auth::id())
    //         ->where('status', $status)
    //         ->get();

    //     return view('tasks.index', compact('tasks'));
    // }

    public function filterByStatus(Request $request, $status)
    {
        // Default sorting
        $sortField = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'asc');
    
        // Filter task berdasarkan status dengan sorting
        $tasks = Task::where('user_id', Auth::id())
            ->where('status', $status)
            ->orderBy($sortField, $sortDirection)
            ->get();
    
        return view('tasks.index', compact('tasks', 'status', 'sortField', 'sortDirection'));
    }

    public function updateStatus(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->status = $request->input('status');
        $task->save();

        return redirect()->back()->with('success', "Task \"" . $task->title . "\" status has been changed.");
    }
}
