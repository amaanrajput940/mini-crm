<?php

use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::where('role_id', 1)->delete();
        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role_id' => 1
        ]);
    }
}
