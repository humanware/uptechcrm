<?php

namespace Database\Seeders;

use App\Domain\Branches\Models\Branch;
use App\Domain\Departments\Models\Department;
use App\Domain\Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $nepal = Branch::where('name', 'Nepal')->first();
        $sales = Department::where('name', 'Sales')->first();
        $dev = Department::where('name', 'Development')->first();
        $seo = Department::where('name', 'SEO')->first();
        $graphics = Department::where('name', 'Graphics')->first();

        $users = [
            ['name' => 'Admin', 'email' => 'admin@uptech.test', 'role' => 'Super Admin', 'department' => $sales],
            ['name' => 'Sales Manager', 'email' => 'sales@uptech.test', 'role' => 'Sales Manager', 'department' => $sales],
            ['name' => 'Development Manager', 'email' => 'devmanager@uptech.test', 'role' => 'Development Manager', 'department' => $dev],
            ['name' => 'Developer One', 'email' => 'dev1@uptech.test', 'role' => 'Employee', 'department' => $dev],
            ['name' => 'SEO Specialist', 'email' => 'seo1@uptech.test', 'role' => 'Employee', 'department' => $seo],
            ['name' => 'Graphics Designer', 'email' => 'gfx1@uptech.test', 'role' => 'Employee', 'department' => $graphics],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                    'department_id' => optional($data['department'])->id,
                    'branch_id' => optional($nepal)->id,
                ]
            );

            $user->assignRole($data['role']);
        }
    }
}
