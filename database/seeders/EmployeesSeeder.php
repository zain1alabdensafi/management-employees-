<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'job_id' => 1,
            'department_id' =>1,
            'role_id' =>2,
            'first_name'=>  'Hassan',
            'last_name'=> 'Hassan',
            'email'=> 'hassan@gmail.com',
            'password'=> Hash::make('1234567891'),
            'hireDate' => '2010-03-01',
            'salary' => 700,
            'comissions' => 0.5
        ]);
        DB::table('employees')->insert([
            'job_id' => 2,
            'department_id' =>1,
            'role_id' =>2,
            'first_name'=>  'Hussein',
            'last_name'=> 'hussein',
            'email'=> 'hussein@gmail.com',
            'password'=> Hash::make('1234567892'),
            'hireDate' => '2012-01-01',
            'salary' => 600,
            'comissions' => 0.3
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>1,
            'role_id' =>2,
            'first_name'=>  'jony',
            'last_name'=> 'jony',
            'email'=> 'jony@gmail.com',
            'password'=> Hash::make('1234567893'),
            'hireDate' => '2011-05-01',
            'salary' => 800,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>1,
            'role_id' =>2,
            'first_name'=>  'carmen',
            'last_name'=> 'carmen',
            'email'=> 'carmen@gmail.com',
            'password'=> Hash::make('1234567894'),
            'hireDate' => '2022-05-01',
            'salary' => 100,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 1,
            'department_id' =>2,
            'role_id' =>2,
            'first_name'=>  'amar',
            'last_name'=> 'amar',
            'email'=> 'amar@gmail.com',
            'password'=> Hash::make('1234567895'),
            'hireDate' => '2009-01-01',
            'salary' => 700,
            'comissions' => 0.5
        ]);
        DB::table('employees')->insert([
            'job_id' => 2,
            'department_id' =>2,
            'role_id' =>2,
            'first_name'=>  'amer',
            'last_name'=> 'amer',
            'email'=> 'amer@gmail.com',
            'password'=> Hash::make('1234567896'),
            'hireDate' => '2011-06-01',
            'salary' => 600,
            'comissions' => 0.3
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>2,
            'role_id' =>2,
            'first_name'=>  'smer',
            'last_name'=> 'smer',
            'email'=> 'smer@gmail.com',
            'password'=> Hash::make('1234567897'),
            'hireDate' => '2013-06-01',
            'salary' => 400,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>2,
            'role_id' =>2,
            'first_name'=>  'kmal',
            'last_name'=>'kmal',
            'email'=> 'kmal@gmail.com',
            'password'=> Hash::make('1234567898'),
            'hireDate' => '2013-06-01',
            'salary' => 650,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>2,
            'role_id' =>2,
            'first_name'=>  'wael',
            'last_name'=> 'wael',
            'email'=> 'wael@gmail.com',
            'password'=> Hash::make('1234567899'),
            'hireDate' => '2024-06-01',
            'salary' => 90,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>2,
            'role_id' =>2,
            'first_name'=>  'reham',
            'last_name'=> 'reham',
            'email'=> 'reham@gmail.com',
            'password'=> Hash::make('12345678910'),
            'hireDate' => '2014-06-01',
            'salary' => 900,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 1,
            'department_id' =>3,
            'role_id' =>2,
            'first_name'=>  'salem',
            'last_name'=> 'salem',
            'email'=> 'salem@gmail.com',
            'password'=> Hash::make('12345678911'),
            'hireDate' => '2010-02-01',
            'salary' => 700,
            'comissions' => 0.5
        ]);
        DB::table('employees')->insert([
            'job_id' => 2,
            'department_id' =>3,
            'role_id' =>2,
            'first_name'=>  'ahmad',
            'last_name'=> 'ahmad',
            'email'=> 'ahmad@gmail.com',
            'password'=> Hash::make('12345678912'),
            'hireDate' => '2010-04-01',
            'salary' => 600,
            'comissions' => 0.3
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>3,
            'role_id' =>2,
            'first_name'=>  'Hassan',
            'last_name'=> 'Hassan1',
            'email'=> 'hassan1@gmail.com',
            'password'=> Hash::make('12345678913'),
            'hireDate' => '2011-01-01',
            'salary' => 500,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>3,
            'role_id' =>2,
            'first_name'=>  'yman',
            'last_name'=> 'yman',
            'email'=> 'yman@gmail.com',
            'password'=> Hash::make('12345678914'),
            'hireDate' => '2011-01-01',
            'salary' => 850,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>3,
            'role_id' =>2,
            'first_name'=>  'yomna',
            'last_name'=> 'yomna',
            'email'=> 'yomna@gmail.com',
            'password'=> Hash::make('12345678915'),
            'hireDate' => '2023-01-01',
            'salary' => 95,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>3,
            'role_id' =>2,
            'first_name'=>  'laith',
            'last_name'=> 'laith',
            'email'=> 'laith@gmail.com',
            'password'=> Hash::make('12345678916'),
            'hireDate' => '2014-01-01',
            'salary' => 600,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>3,
            'role_id' =>2,
            'first_name'=>  'ali',
            'last_name'=> 'ali',
            'email'=> 'ali@gmail.com',
            'password'=> Hash::make('12345678917'),
            'hireDate' => '2010-01-01',
            'salary' => 950,
            'comissions' => 0.1
        ]);
        DB::table('employees')->insert([
            'job_id' => 4,
            'department_id' =>4,
            'role_id' =>1,
            'first_name'=>  'zain',
            'last_name'=> 'safi',
            'email'=> 'zainalabdensafi@gmail.com',
            'password'=> Hash::make('12345678918'),
            'hireDate' => '2014-05-01',
            'salary' => 700,
            'comissions' => 0.2
        ]);
        DB::table('employees')->insert([
            'job_id' => 3,
            'department_id' =>3,
            'role_id' =>2,
            'first_name'=>  'zoze',
            'last_name'=> 'safi',
            'email'=> 'zoze@gmail.com',
            'password'=> Hash::make('12345678918'),
            'hireDate' => '2014-05-01',
            'salary' => 700,
            'comissions' => 0.2
        ]);
    }
}
