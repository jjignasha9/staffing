<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('Hello@123'),
                'address' => 'Surat',
                'role' => 1,
            ], [
                'name' => 'John',
                'email' => 'john@example.com',
                'password' => Hash::make('Hello@123'),
                'address' => 'Surat',
                'role' => 2,
            ], [
                'name' => 'Robert',
                'email' => 'robert@example.com',
                'password' => Hash::make('Hello@123'),
                'address' => 'Surat',
                'role' => 3,
            ],  [
                'name' => 'Matthew',
                'email' => 'matthew@example.com',
                'password' => Hash::make('Hello@123'),
                'address' => 'Surat',
                'role' => 4,
            ],
        ];

        User::insert($users);


    }
}
