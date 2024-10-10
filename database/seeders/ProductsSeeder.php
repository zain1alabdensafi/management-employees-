<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'product_name' => 'product 1',
            'quantity' => 50
        ]);
        DB::table('products')->insert([
            'product_name' => 'product 2',
            'quantity'=>30
        ]);
        DB::table('products')->insert([
            'product_name' => 'product 3',
            'quantity'=>40
        ]);
    }
}
