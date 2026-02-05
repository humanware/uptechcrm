@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>{{ $task->title }}</h4>
        <p><strong>Project:</strong> {{ $task->project->name }}</p>
        <p><strong>Status:</strong> {{ $task->status }}</p>
        <p><strong>Assignee:</strong> {{ optional($task->assignee)->name }}</p>
        <p><strong>Reviewer:</strong> {{ optional($task->reviewer)->name }}</p>
        <p>{{ $task->description }}</p>
    </div>
</div>
@endsection
