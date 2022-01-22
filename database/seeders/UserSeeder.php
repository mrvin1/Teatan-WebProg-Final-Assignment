<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('123123123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'stanley',
            'email' => 'stanley@email.com',
            'password' => Hash::make('123123123'),
            'role' => 'user'
        ]);

        User::create([
            'name' => 'patricia',
            'email' => 'patricia@email.com',
            'password' => Hash::make('123123123'),
            'role' => 'user'
        ]);
    }
}
