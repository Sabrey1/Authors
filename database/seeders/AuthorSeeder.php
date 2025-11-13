<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('authors')->insert([
                'name' => 'Author ' . $i,
                'email' => 'author' . $i . '@example.com',
                'website' => 'https://author' . $i . '.com',
                'biography' => 'This is the biography of Author ' . $i,
                'birth_date' => now()->subYears(rand(20, 60))->toDateString(),
                'country' => ['Cambodia', 'USA', 'UK', 'France', 'Japan'][array_rand(['Cambodia', 'USA', 'UK', 'France', 'Japan'])],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
