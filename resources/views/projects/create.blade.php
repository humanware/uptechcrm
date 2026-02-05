@extends('layouts.app')

@section('title', 'New Project')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('projects.store') }}">
            @csrf
            @include('projects.partials.form', ['project' => null])
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>
@endsection
