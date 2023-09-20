<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = 'categories';
        \DB::table($table)->truncate();
        \DB::table($table)->insert([
            'parent_id' => 0,
            'slug' => 'category-1',
            'display_name' => 'Category 1',
        ]);
        \DB::table($table)->insert([
            'parent_id' => 1,
            'slug' => 'subcategory-1',
            'display_name' => 'Subcategory 1',
        ]);
        \DB::table($table)->insert([
            'parent_id' => 1,
            'slug' => 'subcategory-2',
            'display_name' => 'Subcategory 2',
        ]);

        \DB::table($table)->insert([
            'parent_id' => 0,
            'slug' => 'category-2',
            'display_name' => 'Category 2',
        ]);
        \DB::table($table)->insert([
            'parent_id' => 4,
            'slug' => 'subcategory-1',
            'display_name' => 'Subcategory 1',
        ]);
        \DB::table($table)->insert([
            'parent_id' => 4,
            'slug' => 'subcategory-2',
            'display_name' => 'Subcategory 2',
        ]);
    }
}
