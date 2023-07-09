<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'phone' => '0',
            'password' => Hash::make('usertest@1'),
        ]);
    }
}
