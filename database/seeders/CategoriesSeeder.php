<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
     DB::table('tb_categories')->insert([
            ['name' => 'Disaster', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Charity', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Community', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medical', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Education', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Environment', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Animals', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Artistic', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sports', 'created_at' => now(), 'updated_at' => now()],

           
        ]);
    }
}
