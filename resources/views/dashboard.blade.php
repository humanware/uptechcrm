@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $projectCount }}</h3>
                <p>Projects</p>
            </div>
            <div class="icon"><i class="fas fa-folder"></i></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $taskCount }}</h3>
                <p>Tasks</p>
            </div>
            <div class="icon"><i class="fas fa-tasks"></i></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $ticketCount }}</h3>
                <p>Tickets</p>
            </div>
            <div class="icon"><i class="fas fa-life-ring"></i></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $leaveCount }}</h3>
                <p>Leave Requests</p>
            </div>
            <div class="icon"><i class="fas fa-plane"></i></div>
        </div>
    </div>
</div>
@endsection
