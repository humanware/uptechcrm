@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('projects.update', $project) }}">
            @csrf
            @method('PUT')
            @include('projects.partials.form', ['project' => $project])
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection
