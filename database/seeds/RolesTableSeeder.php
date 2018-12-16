<?php

use Illuminate\Database\Seeder;
use App\Entities\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Role A', 'Role B', 'Role C'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
