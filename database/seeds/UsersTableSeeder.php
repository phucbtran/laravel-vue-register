<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Entities\User;
use App\Entities\Department;
use App\Entities\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmentsId = Department::pluck('id');
        $rolesId = Role::pluck('id');
        $faker = Faker::create();
        foreach (range(0, 20) as $index) {
            User::create([
                'email' => $faker->email,
                'password' => bcrypt('12345678'),
                'name' => $faker->name,
                'department_id' => $departmentsId[rand(0, count($departmentsId) - 1)],
                'role_id' => $rolesId[rand(0, count($rolesId) - 1)],
            ]);
        }
    }
}
