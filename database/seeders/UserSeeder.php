<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'user_type' => 'admin',
            'username' => 'Admin',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('12345678'),
        ]);
    }
}
