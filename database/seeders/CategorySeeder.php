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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
 
        $categories = [
            ['label' => 'concert', 'category_id' => null],
            ['label' => 'Théâtre', 'category_id' => null],
            ['label' => 'Magie', 'category_id' => null],
        ];
 
        DB::table('category')->insert($categories);
    }
}
