@extends('layouts.app')

@section('title', 'Ticket Details')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>{{ $ticket->title }}</h4>
        <p><strong>Project:</strong> {{ optional($ticket->project)->name }}</p>
        <p><strong>Status:</strong> {{ $ticket->status }}</p>
        <p><strong>Priority:</strong> {{ $ticket->priority }}</p>
        <p>{{ $ticket->description }}</p>
    </div>
</div>
@endsection
