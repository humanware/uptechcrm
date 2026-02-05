<?php

namespace App\Domain\Tasks\Http\Controllers;

use App\Domain\Projects\Models\Project;
use App\Domain\Tasks\Models\Task;
use App\Domain\Users\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index', [
            'tasks' => Task::with(['project', 'assignee', 'reviewer'])->latest()->get(),
        ]);
    }

    public function create(Project $project)
    {
        return view('tasks.create', [
            'project' => $project,
            'users' => User::all(),
        ]);
    }

    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'assignee_id' => ['nullable', 'exists:users,id'],
            'reviewer_id' => ['nullable', 'exists:users,id'],
            'due_at' => ['nullable', 'date'],
        ]);

        $data['status'] = 'in_progress';
        $data['project_id'] = $project->id;

        Task::create($data);

        return redirect()->route('projects.show', $project)->with('status', 'Task created.');
    }

    public function show(Task $task)
    {
        $task->load(['project', 'assignee', 'reviewer']);

        return view('tasks.show', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task,
            'users' => User::all(),
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'string'],
            'assignee_id' => ['nullable', 'exists:users,id'],
            'reviewer_id' => ['nullable', 'exists:users,id'],
            'due_at' => ['nullable', 'date'],
        ]);

        $task->update($data);

        return redirect()->route('tasks.show', $task)->with('status', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('status', 'Task deleted.');
    }

    public function updateStatus(Request $request, Task $task)
    {
        $data = $request->validate([
            'status' => ['required', 'string'],
        ]);

        $task->update($data);

        return response()->json(['message' => 'Status updated']);
    }
}
