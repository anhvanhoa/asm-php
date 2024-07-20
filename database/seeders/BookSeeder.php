<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 50; $i++) {
            $book = [
                'title' => fake()->sentence(5),
                'author' => rand(1, 5),
                'publishing_company' => rand(1, 5),
                'publish_date' => now(),
                'price' => rand(10000, 100000),
                'tag' => 'Yêu thích',
                'quantity' => rand(1, 100),
                'thumbnail' => 'https://307a0e78.vws.vegacdn.vn/view/v2/image/img.book/0/0/1/48181.jpg',
                'synopsis' => fake()->paragraph(5),
            ];
            \App\Models\Book::create($book);
        }
    }
}
