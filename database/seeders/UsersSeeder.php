<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersData = [
            [
                'name'     => 'Admin',
                'email'    => 'admin@example.com',
                'type'     => 1, // Assuming 1 is for Teacher or you can define it as Admin
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => 'student',
                'email'    => 'student@example.com',
                'type'     => 0, // Assuming 1 is for Teacher or you can define it as Admin
                'password' => Hash::make('12345678'),
            ],
            [
                'name'     => 'guardian',
                'email'    => 'guardian@example.com',
                'type'     => 2, // Assuming 1 is for Teacher or you can define it as Admin
                'password' => Hash::make('12345678'),
            ],
            
        ];
        foreach ($usersData as $key => $val) {
            User::create($val);
        }
    }
}
