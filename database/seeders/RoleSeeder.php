<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'projects.view', 'projects.create', 'projects.update', 'projects.delete',
            'tasks.view', 'tasks.create', 'tasks.update', 'tasks.delete',
            'tickets.view', 'tickets.create', 'tickets.update', 'tickets.delete',
            'leaves.view', 'leaves.create', 'leaves.approve',
            'users.manage', 'departments.manage', 'branches.manage',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $salesManager = Role::firstOrCreate(['name' => 'Sales Manager', 'guard_name' => 'web']);
        $devManager = Role::firstOrCreate(['name' => 'Development Manager', 'guard_name' => 'web']);
        $employee = Role::firstOrCreate(['name' => 'Employee', 'guard_name' => 'web']);
        $supportAgent = Role::firstOrCreate(['name' => 'Support Agent', 'guard_name' => 'web']);

        $superAdmin->syncPermissions($permissions);
        $salesManager->syncPermissions(['projects.view', 'projects.create', 'projects.update', 'tickets.view', 'tickets.create']);
        $devManager->syncPermissions(['projects.view', 'projects.update', 'tasks.view', 'tasks.create', 'tasks.update', 'tickets.view', 'tickets.update', 'departments.manage']);
        $employee->syncPermissions(['tasks.view', 'tasks.update', 'leaves.view', 'leaves.create']);
        $supportAgent->syncPermissions(['tickets.view', 'tickets.update']);
    }
}
