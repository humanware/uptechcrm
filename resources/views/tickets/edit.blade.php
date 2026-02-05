@extends('layouts.app')

@section('title', 'Edit Ticket')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('tickets.update', $ticket) }}">
            @csrf
            @method('PUT')
            @include('tickets.partials.form', ['ticket' => $ticket])
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection
