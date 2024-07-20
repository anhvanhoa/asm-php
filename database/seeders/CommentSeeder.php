<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $comment = [
                'content' => fake()->sentence(5),
                'book_id' => rand(1, 50),
                'name' => fake()->name(),
                'rating' => rand(1, 5),
            ];
            \App\Models\Comment::create($comment);
        }
    }
}
