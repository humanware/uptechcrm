@extends('layouts.app')

@section('title', 'Request Leave')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('leaves.store') }}">
            @csrf
            <div class="form-group">
                <label>Reason</label>
                <textarea class="form-control" name="reason" required>{{ old('reason') }}</textarea>
            </div>
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" class="form-control" name="starts_at" value="{{ old('starts_at') }}" required>
            </div>
            <div class="form-group">
                <label>End Date</label>
                <input type="date" class="form-control" name="ends_at" value="{{ old('ends_at') }}" required>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
