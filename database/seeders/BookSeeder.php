<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $book = [
            [
                'title' => 'Penjara Ke Penjara',
                'author' => 'Tan Malaka',
                'published_year' => 1960,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Madilog',
                'author' => 'Tan Malaka',
                'published_year' => 1949,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('book')->insert($book);
    }
}
