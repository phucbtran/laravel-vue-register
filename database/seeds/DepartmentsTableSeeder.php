<?php

use Illuminate\Database\Seeder;
use App\Entities\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = ['Department A', 'Department B', 'Department C'];
        foreach ($departments as $department) {
            Department::create(['name' => $department]);
        }
    }
}
