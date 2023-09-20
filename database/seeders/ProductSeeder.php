<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = 'products';
        \DB::table($table)->truncate();
        \DB::table($table)->insert([
            'name' => \Str::random(10),
            'price' => 1000.00,
            'image_path' => 'https://placehold.co/200',
            'description' => 'Buy it today!',
            'is_available' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        \DB::table($table)->insert([
            'name' => \Str::random(10),
            'price' => 1001.00,
            'image_path' => 'https://placehold.co/200',
            'description' => 'Buy it tomorrow!',
            'is_available' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        \DB::table($table)->insert([
            'name' => \Str::random(10),
            'price' => 1002.01,
            'image_path' => 'https://placehold.co/200',
            'description' => 'Buy it always!',
            'is_available' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
