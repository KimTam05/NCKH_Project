<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobType::create([
            'job_type' => 'Full-time',
        ]);
        JobType::create([
            'job_type' => 'Part-time',
        ]);
        JobType::create([
            'job_type' => 'Internship',
        ]);
    }
}
