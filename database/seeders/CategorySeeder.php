<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Science',
            ],
            [
                'name' => 'History',
            ],
            [
                'name' => 'Literature',
            ],
            [
                'name' => 'Technology',
            ],
            [
                'name' => 'Education',
            ],
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
