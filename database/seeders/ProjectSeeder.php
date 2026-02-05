<?php

namespace Database\Seeders;

use App\Domain\Departments\Models\Department;
use App\Domain\Projects\Models\Project;
use App\Domain\Tasks\Models\Task;
use App\Domain\Tickets\Models\Ticket;
use App\Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $development = Department::where('name', 'Development')->first();
        $manager = User::where('email', 'devmanager@uptech.test')->first();
        $sales = User::where('email', 'sales@uptech.test')->first();
        $assignee = User::where('email', 'dev1@uptech.test')->first();

        $project = Project::create([
            'name' => 'Uptech Demo Website',
            'client_name' => 'Demo Client',
            'client_email' => 'client@example.com',
            'requirements' => 'Landing page, contact form, and analytics setup.',
            'status' => 'development',
            'sample_status' => 'sample_approved',
            'department_id' => optional($development)->id,
            'manager_id' => optional($manager)->id,
            'sales_owner_id' => optional($sales)->id,
            'starts_at' => now()->toDateString(),
            'ends_at' => now()->addWeeks(2)->toDateString(),
        ]);

        Task::create([
            'project_id' => $project->id,
            'title' => 'Prepare UI mockups',
            'description' => 'Create AdminLTE UI mockups for client review.',
            'status' => 'in_review',
            'assignee_id' => optional($assignee)->id,
            'reviewer_id' => optional($manager)->id,
        ]);

        Ticket::create([
            'project_id' => $project->id,
            'title' => 'Update contact form email',
            'description' => 'Client requests sending contact form to new address.',
            'status' => 'open',
            'priority' => 'high',
            'requested_by_id' => optional($sales)->id,
            'assigned_to_id' => optional($assignee)->id,
        ]);
    }
}
