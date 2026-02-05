<?php

use App\Domain\Projects\Http\Controllers\ProjectController;
use App\Domain\Tasks\Http\Controllers\TaskController;
use App\Domain\Tickets\Http\Controllers\TicketController;
use App\Domain\Leaves\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('projects', [ProjectController::class, 'index']);
    Route::post('projects', [ProjectController::class, 'store']);
    Route::patch('projects/{project}/status', [ProjectController::class, 'updateStatus']);

    Route::post('projects/{project}/tasks', [TaskController::class, 'store']);
    Route::patch('tasks/{task}/status', [TaskController::class, 'updateStatus']);

    Route::post('tickets', [TicketController::class, 'store']);
    Route::patch('tickets/{ticket}/status', [TicketController::class, 'updateStatus']);

    Route::post('leaves', [LeaveController::class, 'store']);
    Route::patch('leaves/{leave}/status', [LeaveController::class, 'updateStatus']);
});
