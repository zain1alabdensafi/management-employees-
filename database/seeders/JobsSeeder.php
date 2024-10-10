<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobs')->insert([
            'job_name' => 'Manager',
            'min_salary' => 500,
            'max_salary' => 700
        ]);
        DB::table('jobs')->insert([
            'job_name' => 'Supervisor',
            'min_salary' => 400,
            'max_salary' => 600
        ]);
        DB::table('jobs')->insert([
            'job_name' => 'Employee',
            'min_salary' => 300,
            'max_salary' => 400
        ]);
        DB::table('jobs')->insert([
            'job_name' => 'Admin',
            'min_salary' =>500,
            'max_salary' => 800
        ]);
    }
}
