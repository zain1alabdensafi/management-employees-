<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'product_id' => 1,
            'employee_id' => 1,
            'order_date'=> '2015-10-9',
            'amount' => 10,
            'status' => true
        ]);
        DB::table('orders')->insert([
            'product_id' => 1,
            'employee_id' => 2,
            'order_date'=> '2016-10-9',
            'amount' => 10,
            'status' => true
        ]);
        DB::table('orders')->insert([
            'product_id' => 1,
            'employee_id' => 3,
            'order_date'=> '2018-10-9',
            'amount' => 10,
            'status' => false
        ]);
        DB::table('orders')->insert([
            'product_id' => 1,
            'employee_id' => 4,
            'order_date'=> '2014-10-9',
            'amount' => 10,
            'status' => true
        ]);
        DB::table('orders')->insert([
            'product_id' => 1,
            'employee_id' => 5,
            'order_date'=> '2013-10-9',
            'amount' => 10,
            'status' => true
        ]);
        DB::table('orders')->insert([
            'product_id' => 1,
            'employee_id' => 6,
            'order_date'=> '2018-10-9',
            'amount' => 10,
            'status' => true
        ]);
        DB::table('orders')->insert([
            'product_id' => 1,
            'employee_id' => 7,
            'order_date'=> '2020-10-9',
            'amount' => 10,
            'status' => true
        ]);
        DB::table('orders')->insert([
            'product_id' => 2,
            'employee_id' => 1,
            'order_date'=> '2016-10-9',
            'amount' => 10,
            'status' => true
        ]);
        DB::table('orders')->insert([
            'product_id' => 2,
            'employee_id' => 2,
            'order_date'=> '2015-11-9',
            'amount' => 10,
            'status' => true
        ]);
        DB::table('orders')->insert([
            'product_id' => 2,
            'employee_id' => 3,
            'order_date'=> '2016-01-9',
            'amount' => 10,
            'status' => false
        ]);
        DB::table('orders')->insert([
            'product_id' => 3,
            'employee_id' => 1,
            'order_date'=> '2018-02-7',
            'amount' => 10,
            'status' => true
        ]);
        DB::table('orders')->insert([
            'product_id' => 3,
            'employee_id' => 2,
            'order_date'=> '2019-02-7',
            'amount' => 10,
            'status' => false
        ]);
        DB::table('orders')->insert([
            'product_id' => 3,
            'employee_id' => 3,
            'order_date'=> '2020-04-17',
            'amount' => 10,
            'status' => true
        ]);
    }
}
