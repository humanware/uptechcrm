@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')
            @include('tasks.partials.form', ['task' => $task])
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection
