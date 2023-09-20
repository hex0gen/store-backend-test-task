<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = 'product_categories';
        \DB::table($table)->truncate();

        \DB::table($table)->truncate();

        \DB::table($table)->insert([
            'category_id' => 1,
            'product_id' => 1
        ]);
        \DB::table($table)->insert([
            'category_id' => 1,
            'product_id' => 2
        ]);
        \DB::table($table)->insert([
            'category_id' => 4,
            'product_id' => 3
        ]);
        \DB::table($table)->insert([
            'category_id' => 5,
            'product_id' => 3
        ]);
    }
}
