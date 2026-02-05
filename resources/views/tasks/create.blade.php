@extends('layouts.app')

@section('title', 'New Task')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('projects.tasks.store', $project) }}">
            @csrf
            @include('tasks.partials.form', ['task' => null])
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>
@endsection
