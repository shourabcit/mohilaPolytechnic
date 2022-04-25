<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'principal',
            'vice principal',
            'register',
            'dept. head',
            'workshop super',
            'craft instructor',
        ];

        foreach($roles as $role){
            Role::create(['guard_name' => 'admin', 'name' => $role]);
        }
        Role::create(['name' => 'student']);

        Admin::find(1)->assignRole('admin');
        Admin::find(2)->assignRole('admin');
        Admin::find(3)->assignRole('dept. head');
        User::find(1)->assignRole('student');
    }
}
