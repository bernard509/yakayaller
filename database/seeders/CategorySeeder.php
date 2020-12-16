<?php

namespace Database\Seeders;

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
        DB::table('category')->truncate();
 
        $categories = [
            ['label' => 'concert', 'category_id' => null],
            ['label' => 'Théâtre', 'category_id' => null],
            ['label' => 'Magie', 'category_id' => null],
        ];
 
        DB::table('category')->insert($categories);
    }
}
