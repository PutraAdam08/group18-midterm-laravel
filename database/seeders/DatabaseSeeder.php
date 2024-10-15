<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        DB::table('brands')->insert([
            [
            'name' => 'yu gi oh',
            'slug' => 'yu-gi-oh'
            ]
        ]);

        DB::table('categories')->insert([
            [
            'name' => 'moinster',
            'slug' => 'moinster'
            ]
        ]);
    }
}
