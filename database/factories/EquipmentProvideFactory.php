<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentProvideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'department' => 1,
            'lab' => 6,
            'approved' => 0,
            'isReturn' => 0,
        ];
    }
}
