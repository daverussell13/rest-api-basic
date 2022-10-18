<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                "name" => "user1",
                "email" => "user1@gmail.com",
            ],
            [
                "name" => "user2",
                "email" => "user2@gmail.com",
            ],
            [
                "name" => "user3",
                "email" => "user3@gmail.com",
            ]
        ];

        foreach ($userData as $data) {
            User::factory()->create($data);
        }
    }
}
