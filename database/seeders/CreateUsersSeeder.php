<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@lancer.com',
                'phone' => '1111111111',
                'type' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Vendor User',
                'email' => 'vendor@lancer.com',
                'phone' => '2222222222',
                'type' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@lancer.com',
                'phone' => '0000000000',
                'type' => 0,
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
