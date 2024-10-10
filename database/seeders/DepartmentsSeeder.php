<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'department_name' => 'Data'
        ]);
        DB::table('departments')->insert([
            'department_name' => 'HR'
        ]);
        DB::table('departments')->insert([
            'department_name' => 'CS'
        ]);
        DB::table('departments')->insert([
            'department_name' => 'Support'
        ]);
    }
}
