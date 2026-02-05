<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Domain\Projects\Http\Controllers\ProjectController;
use App\Domain\Tasks\Http\Controllers\TaskController;
use App\Domain\Tickets\Http\Controllers\TicketController;
use App\Domain\Leaves\Http\Controllers\LeaveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('projects', ProjectController::class);
    Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::resource('projects.tasks', TaskController::class)->shallow();
    Route::resource('tickets', TicketController::class);
    Route::resource('leaves', LeaveController::class)->only(['index', 'create', 'store']);
    Route::patch('leaves/{leave}/status', [LeaveController::class, 'updateStatus'])->name('leaves.status');
    Route::post('notifications/read-all', [NotificationController::class, 'markAllRead']);
});
