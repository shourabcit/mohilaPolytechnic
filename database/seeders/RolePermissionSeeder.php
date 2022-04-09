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
            'super admin',
            'craft instructor',
            'workshop super',
            'dept head',
            'register',
            'vice principal',
            'principal'
        ];

        foreach($roles as $role){
            Role::create(['guard_name' => 'admin', 'name' => $role]);
        }
        Role::create(['name' => 'student']);

        Admin::find(1)->assignRole('super admin');
        Admin::find(2)->assignRole('super admin');
        User::find(1)->assignRole('student');
        User::find(2)->assignRole('student');
    }
}
