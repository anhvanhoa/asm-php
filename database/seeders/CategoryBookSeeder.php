<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 50; $i++) {
            $categoryBook = [
                'category_id' => rand(1, 5),
                'book_id' => $i,
            ];
            \App\Models\CategoryBook::create($categoryBook);
        }
    }
}
