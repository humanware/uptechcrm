<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BranchSeeder::class,
            DepartmentSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
