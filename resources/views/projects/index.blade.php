@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="mb-3">
    <a href="{{ route('projects.create') }}" class="btn btn-primary">New Project</a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Client</th>
                    <th>Status</th>
                    <th>Sample</th>
                    <th>Manager</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->client_name }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->sample_status }}</td>
                        <td>{{ optional($project->manager)->name }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form method="post" action="{{ route('projects.destroy', $project) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
