<?php

namespace App\Domain\Projects\Http\Controllers;

use App\Domain\Projects\Models\Project;
use App\Domain\Departments\Models\Department;
use App\Domain\Users\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::with(['department', 'manager', 'salesOwner'])->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('projects.create', [
            'departments' => Department::all(),
            'managers' => User::role('Development Manager')->get(),
            'sales' => User::role('Sales Manager')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'client_name' => ['required', 'string', 'max:255'],
            'client_email' => ['nullable', 'email'],
            'requirements' => ['required', 'string'],
            'sample_status' => ['required', 'string'],
            'department_id' => ['nullable', 'exists:departments,id'],
            'manager_id' => ['nullable', 'exists:users,id'],
            'sales_owner_id' => ['nullable', 'exists:users,id'],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
        ]);

        $data['status'] = $data['sample_status'] === 'sample_approved' ? 'development' : 'sample';

        Project::create($data);

        return redirect()->route('projects.index')->with('status', 'Project created.');
    }

    public function show(Project $project)
    {
        $project->load(['tasks', 'department', 'manager', 'salesOwner']);

        return view('projects.show', ['project' => $project]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'departments' => Department::all(),
            'managers' => User::role('Development Manager')->get(),
            'sales' => User::role('Sales Manager')->get(),
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'client_name' => ['required', 'string', 'max:255'],
            'client_email' => ['nullable', 'email'],
            'requirements' => ['required', 'string'],
            'sample_status' => ['required', 'string'],
            'status' => ['required', 'string'],
            'department_id' => ['nullable', 'exists:departments,id'],
            'manager_id' => ['nullable', 'exists:users,id'],
            'sales_owner_id' => ['nullable', 'exists:users,id'],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
        ]);

        $project->update($data);

        return redirect()->route('projects.index')->with('status', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'Project deleted.');
    }

    public function updateStatus(Request $request, Project $project)
    {
        $data = $request->validate([
            'status' => ['required', 'string'],
        ]);

        $project->update($data);

        return response()->json(['message' => 'Status updated']);
    }
}
