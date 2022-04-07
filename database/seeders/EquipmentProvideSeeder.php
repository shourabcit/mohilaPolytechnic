<?php

namespace Database\Seeders;

use App\Models\EquipmentProvide;
use Illuminate\Database\Seeder;

class EquipmentProvideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EquipmentProvide::factory(2000)->create();
    }
}
