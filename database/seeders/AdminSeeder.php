<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'shourab',
            'email' => 'shourab.cit.bd@gmail.com',
            'phone' => '01997492233',
            'img' => 'https://avatars.dicebear.com/api/adventurer/your-custom-seed.svg',
            'password' => Hash::make('password'),
        ]);
        Admin::create([
            'name' => 'zahid',
            'email' => 'zahid.cit.bd@gmail.com',
            'phone' => '01847422963',
            'img' => 'https://avatars.dicebear.com/api/adventurer/your-custom-seed.svg',
            'password' => Hash::make('password'),
        ]);
    }
}
