<?php

namespace App\Http\Controllers;

use App\Domain\Projects\Models\Project;
use App\Domain\Tasks\Models\Task;
use App\Domain\Tickets\Models\Ticket;
use App\Domain\Leaves\Models\LeaveRequest;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'projectCount' => Project::count(),
            'taskCount' => Task::count(),
            'ticketCount' => Ticket::count(),
            'leaveCount' => LeaveRequest::count(),
        ]);
    }
}
