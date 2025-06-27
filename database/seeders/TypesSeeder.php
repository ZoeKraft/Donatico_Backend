<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_types')->insert([
            ['name' => 'Contribucion Monetaria', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Contribucion Voluntariado Presencial', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
