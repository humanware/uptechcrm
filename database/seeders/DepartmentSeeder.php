<?php

namespace Database\Seeders;

use App\Domain\Departments\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = ['Sales', 'Development', 'SEO', 'SMM', 'Graphics', 'Support'];

        foreach ($departments as $name) {
            Department::firstOrCreate(['name' => $name]);
        }
    }
}
