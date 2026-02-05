@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <h4>{{ $project->name }}</h4>
        <p><strong>Client:</strong> {{ $project->client_name }} ({{ $project->client_email }})</p>
        <p><strong>Status:</strong> {{ $project->status }}</p>
        <p><strong>Sample:</strong> {{ $project->sample_status }}</p>
        <p><strong>Requirements:</strong> {{ $project->requirements }}</p>
        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Edit</a>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Tasks</span>
        <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-sm btn-primary">Add Task</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Assignee</th>
                    <th>Reviewer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project->tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ optional($task->assignee)->name }}</td>
                        <td>{{ optional($task->reviewer)->name }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
