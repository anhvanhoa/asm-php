<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'Nguyen Van A',
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'avatar' => 'https://via.placeholder.com/150',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien.',
            ],
            [
                'name' => 'Nguyen Van B',
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'avatar' => 'https://via.placeholder.com/150',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien.',
            ],
            [
                'name' => 'Nguyen Van C',
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'avatar' => 'https://via.placeholder.com/150',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien.',
            ],
            [
                'name' => 'Nguyen Van D',
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'avatar' => 'https://via.placeholder.com/150',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien.',
            ],
            [
                'name' => 'Nguyen Van E',
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'avatar' => 'https://via.placeholder.com/150',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien.',
            ],
        ];
        foreach ($authors as $author) {
            \App\Models\Author::create($author);
        }
    }
}
