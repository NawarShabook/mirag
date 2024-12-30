<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' =>'admin',
            'email' => 'admin@email.com',
            'city' => 'جسر الشغور',
            'password' =>Hash::make('12345678'),
            'role'=>1,
        ]);

        User::create([
            'name' =>'user',
            'email' => 'user@email.com',
            'city' => 'جسر الشغور',
            'password' =>Hash::make('12345678')
        ]);

    }
}
