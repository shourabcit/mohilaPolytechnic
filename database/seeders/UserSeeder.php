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
            'name' => 'shourab',
            'email' => 'shourab.cit.bd@gmail.com',
            'phone' => '01997492233',
            'img' => 'https://avatars.dicebear.com/api/adventurer/your-custom-seed.svg',
            'approved' => 1,
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'zahid',
            'email' => 'zahid.cit.bd@gmail.com',
            'phone' => '01847422963',
            'img' => 'https://avatars.dicebear.com/api/adventurer/your-custom-seed.svg',
            'approved' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
