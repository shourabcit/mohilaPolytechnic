<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\EquipmentProvideSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            RolePermissionSeeder::class,
        ]);
        // $this->call(EquipmentProvideSeeder::class);
    }
}
