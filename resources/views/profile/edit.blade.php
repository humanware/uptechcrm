@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="name" value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input class="form-control" name="password" type="password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input class="form-control" name="password_confirmation" type="password">
            </div>
            <div class="form-group">
                <label>Avatar</label>
                <input class="form-control" name="avatar" type="file">
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
