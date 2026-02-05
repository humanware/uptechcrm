@extends('layouts.app')

@section('title', 'New Ticket')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('tickets.store') }}">
            @csrf
            @include('tickets.partials.form', ['ticket' => null])
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>
@endsection
