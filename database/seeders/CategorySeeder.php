<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => "Sandwiches"],
            ['name' => "Main Meals"],
            ['name' => "Smoothies and Shakes"],
            ['name' => "Juices and Soda"],
['name' => "Hot Drinks"],
];
DB::table('categories')->insert($categories);
    }
}
