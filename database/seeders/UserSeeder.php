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
            'name' => 'Shaharia Islam',
            'email' => 'shahariaislam2@gmail.com',
            'phone' => '01885375989',
            'img' => 'https://avatars.dicebear.com/api/adventurer/your-custom-seed.svg',
            'approved' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
