<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublishingCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishingCompanies = [
            [
                'name' => 'NXB Tuoi Tre',
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'email' => 'nxb@tuoitre.vn',
                'website' => 'https://tuoitre.vn',
                'logo' => 'https://via.placeholder.com/150',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien.',
            ],
            [
                'name' => 'NXB Kim Dong',
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'email' => 'nxb@kimdong.vn',
                'website' => 'https://kimdong.vn',
                'logo' => 'https://via.placeholder.com/150',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien.',
            ],
            [
                'name' => 'NXB Tre',
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'email' => 'nxb@kimdong.vn',
                'website' => 'https://kimdong.vn',
                'logo' => 'https://via.placeholder.com/150',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien.',
            ],
            [
                'name' => 'NXB Tre',
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'email' => 'nxb@kimdong.vn',
                'website' => 'https://kimdong.vn',
                'logo' => 'https://via.placeholder.com/150',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien.',
            ],
        ];
        foreach ($publishingCompanies as $publishingCompany) {
            \App\Models\PublishingCompany::create($publishingCompany);
        }
    }
}
