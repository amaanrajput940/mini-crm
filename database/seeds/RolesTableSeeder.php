<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Company'],
            ['name' => 'Employee'],
        ];
        \App\Role::insert($roles);
    }
}
