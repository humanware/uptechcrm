<?php

namespace Database\Seeders;

use App\Domain\Branches\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        Branch::insert([
            ['name' => 'Nepal', 'timezone' => 'Asia/Kathmandu', 'start_time' => '08:00', 'end_time' => '16:00'],
            ['name' => 'UK', 'timezone' => 'Europe/London', 'start_time' => '14:45', 'end_time' => '22:45'],
            ['name' => 'Australia', 'timezone' => 'Australia/Sydney', 'start_time' => '06:00', 'end_time' => '14:00'],
        ]);
    }
}
